<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class ToursController extends Controller
{

    private $tours;


    public function __construct()
    {
        $this->tours = new Tours();
    }

    public function index(Request $request)
{
    $title = 'Đặt chuyến đi';
    $tours = $this->tours->getAllTours(9);
    $domain = $this->tours->getDomain();

    $domainsCount = [
        'mien_bac' => optional($domain->firstWhere('domain', 'b'))->count,
        'mien_trung' => optional($domain->firstWhere('domain', 't'))->count,
        'mien_nam' => optional($domain->firstWhere('domain', 'n'))->count,
    ];

    // 🌤️ Lấy thời tiết
    $apiKey = env('OPENWEATHER_API_KEY');

    // Bản đồ tên tiếng Việt sang tiếng Anh
    $cityMap = [
        'Hà Nội' => 'Hanoi',
        'Đà Nẵng' => 'Da Nang',
        'TP Hồ Chí Minh' => 'Ho Chi Minh',
        'SAPA' => 'Sa Pa',
        'PHÚ QUỐC' => 'Phu Quoc',
        'Hạ Long' => 'Ha Long',
        'Ninh Bình' => 'Ninh Binh',
        'Quảng Nam' => 'Quang Nam',
        'Vũng Tàu' => 'Vung Tau',
        'Lâm Đồng' => 'Da Lat',
        'Khánh Hòa' => 'Nha Trang',
        'Côn Đảo' => 'Con Dao',
        'Cần Thơ' => 'Can Tho',
        'Quảng Trị' => 'Quang Tri',
        'Quảng Ninh' => 'Quang Ninh',
        'Bình Định' => 'Binh Dinh',
    ];

    foreach ($tours as $tour) {
        $originalCity = $tour->destination ?? 'Hanoi';
        $city = $cityMap[$originalCity] ?? $originalCity;

        $cacheKey = 'weather_' . strtolower(str_replace(' ', '_', $city));

        $weatherData = cache()->remember($cacheKey, 3600, function () use ($city, $apiKey) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'vi',
            ]);

            // Nếu lỗi có thể ghi log nhưng không throw
            if (!$response->successful()) {
                Log::warning("Không lấy được thời tiết cho $city", ['error' => $response->body()]);
                return null;
            }

            return $response->json();
        });

        if ($weatherData) {
            $tour->weather = [
                'temp' => round($weatherData['main']['temp']),
                'desc' => $weatherData['weather'][0]['description'],
                'icon' => $weatherData['weather'][0]['icon'],
            ];
        } else {
            $tour->weather = null;
        }
    }

    if ($request->ajax()) {
        return response()->json([
            'tours' => view('clients.partials.filter-tours', compact('tours'))->render(),
        ]);
    }

    $toursPopular = $this->tours->toursPopular(2);

    return view('clients.tours', compact('title', 'tours', 'domainsCount', 'toursPopular'));
}


    //Xử lý filter tours
    public function filterTours(Request $req)
    {

        $conditions = [];
        $sorting = [];

        // Handle price filter
        if ($req->filled('minPrice') && $req->filled('maxPrice')) {
            $minPrice = $req->minPrice;
            $maxPrice = $req->maxPrice;
            $conditions[] = ['priceAdult', '>=', $minPrice];
            $conditions[] = ['priceAdult', '<=', $maxPrice];
        }

        // Handle domain filter
        if ($req->filled('domain')) {
            $domain = $req->domain;
            $conditions[] = ['domain', '=', $domain];
        }

        // Handle star rating filter
        if ($req->filled('star')) {
            $star = (int) $req->star;
            $conditions[] = ['averageRating', '=', $star];
        }

        // Handle duration filter
        if ($req->filled('time')) {
            $duration = $req->time;
            $time = [
                '3n2d' => '3 ngày 2 đêm',
                '4n3d' => '4 ngày 3 đêm',
                '5n4d' => '5 ngày 4 đêm'
            ];
            $conditions[] = ['time', '=', $time[$duration]];
        }

        // Handle orderby filter
        if ($req->filled('sorting')) {
            $sortingOption = trim($req->sorting); // Remove any whitespace

            // Handle sorting options
            if ($sortingOption == 'new') {
                $sorting = ['tourId', 'DESC']; // Sort by creation date, newest first
            } elseif ($sortingOption == 'old') {
                $sorting = ['tourId', 'ASC']; // Sort by creation date, oldest first
            } elseif ($sortingOption == "hight-to-low") {
                $sorting = ['priceAdult', 'DESC']; // Sort by price in descending order
            } elseif ($sortingOption == "low-to-high") {
                $sorting = ['priceAdult', 'ASC']; // Sort by price in ascending order
            }
        }

        // dd($conditions);
        $tours = $this->tours->filterTours($conditions, $sorting);

        // If not paginated, simulate pagination
        if (!$tours instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            // Create a fake paginator (pagination for non-paginated collection)
            $tours = new \Illuminate\Pagination\LengthAwarePaginator(
                $tours, // Collection
                count($tours), // Total items
                9, // Per page
                1, // Current page
                ['path' => url()->current()] // Path for pagination
            );
        }

        return view('clients.partials.filter-tours', compact('tours'));

    }
}