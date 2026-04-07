<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // Nếu cần log lỗi

class DestinationController extends Controller
{
    private $tours;

    public function __construct(){
        $this->tours = new Tours();
    }

    public function index()
    {
        $title = 'Điểm đến';
        $tours = $this->tours->getAllTours(9); // Lấy 9 tours như cũ

        // Thêm dòng này để gắn thời tiết
        $this->addWeatherToTours($tours);

        return view('clients.destination', compact('title','tours'));
    }

    // Copy nguyên function này từ HomeController sang đây
    private function addWeatherToTours(&$tours)
    {
        $apiKey = env('OPENWEATHER_API_KEY'); // Đảm bảo .env có OPENWEATHER_API_KEY=your_key

        $cityMap = [
            'HÀ NỘI' => 'Hanoi',
            'ĐÀ NẴNG' => 'Da Nang',
            'TP HỒ CHÍ MINH' => 'Ho Chi Minh',
            'SAPA' => 'Sa Pa',          // Thay 'Sa Pa' (có dấu cách)
            'PHÚ QUỐC' => 'Phu Quoc',   // Thay 'Rach Gia' → 'Phu Quoc' chính xác hơn
            'HẠ LONG' => 'Ha Long',     // Thay 'Ha Long' (có dấu cách)
            'NINH BÌNH' => 'Ninh Binh', // Thêm để chính xác
            'QUẢNG NAM' => 'Da Nang',
            'VŨNG TÀU' => 'Vung Tau',
            'LÂM ĐỒNG' => 'Da Lat',
            'KHÁNH HÒA' => 'Nha Trang',
            'CÔN ĐẢO' => 'Con Dao',     // Thay 'Con Dao' (có dấu cách)
            'CẦN THƠ' => 'Can Tho',
            'QUẢNG TRỊ' => 'Dong Ha',   // Quảng Trị gần Dong Ha nhất
            'QUẢNG NINH' => 'Ha Long',  // Quảng Ninh dùng Ha Long làm đại diện
            'BÌNH ĐỊNH' => 'Quy Nhon',  // Bình Định dùng Quy Nhon
        ];

        $normalizedCityMap = collect($cityMap)->mapWithKeys(function ($value, $key) {
            return [\Str::of($key)->lower()->slug('_')->__toString() => $value];
        });

        foreach ($tours as $tour) {
            $originalCity = trim($tour->destination ?? 'Hanoi'); // Nếu không có destination thì fallback Hanoi
            $normalizedCity = \Str::of($originalCity)->lower()->slug('_')->__toString();

            $city = $normalizedCityMap->get($normalizedCity, $originalCity);
            
            $cacheKey = 'weather_' . strtolower(str_replace(' ', '_', $city));

            $weatherData = cache()->remember($cacheKey, 3600, function () use ($city, $apiKey) {
                $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                    'q' => $city . ',VN',  // Thêm ',VN' để chính xác hơn (tránh nhầm thành phố khác)
                    'appid' => $apiKey,
                    'units' => 'metric',
                    'lang' => 'vi',
                ]);

                if ($response->successful()) {
                    return $response->json();
                }

                // Log lỗi nếu cần debug
                Log::warning("Weather API error for city: {$city}", [$response->status(), $response->body()]);
                return null;
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
    }
}