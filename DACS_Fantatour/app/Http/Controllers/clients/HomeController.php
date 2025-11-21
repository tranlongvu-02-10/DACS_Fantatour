<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients\Home;
use App\Models\clients\Tours;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    private $homeTours;
    private $tours;

    public function __construct()
    {
        parent::__construct();
        $this->homeTours = new Home();
        $this->tours = new Tours();
    }
    public function index()
    {
        $title = 'Trang chủ';
        $tours = $this->homeTours->getHomeTours();

        $userId = $this->getUserId();
        if ($userId) {
            
            // Gọi API Python để lấy danh sách tour được gợi ý cho từng người dùng 
            try {
                $apiUrl = 'http://127.0.0.1:5555/api/user-recommendations';
                $response = Http::get($apiUrl, [
                    'user_id' => $userId
                ]);

                if ($response->successful()) {
                    $tourIds = $response->json('recommended_tours');
                } else {
                    $tourIds = [];
                }
            } catch (\Exception $e) {
                // Xử lý lỗi khi gọi API
                $tourIds = [];
                Log::error('Lỗi khi gọi API liên quan: ' . $e->getMessage());
            }

            $toursPopular = $this->tours->toursRecommendation($tourIds);

            if (empty($tourIds)) {
                $toursPopular = $this->tours->toursPopular(6);
                
            }

            // dd($toursPopular);
        }else {
            $toursPopular = $this->tours->toursPopular(6);
        }
        $this->addWeatherToTours($tours);
        $this->addWeatherToTours($toursPopular);
        // dd($toursPopular);
        return view('clients.home', compact('title', 'tours', 'toursPopular'));
    }
    private function addWeatherToTours(&$tours)
    {
        $apiKey = env('OPENWEATHER_API_KEY');

        $cityMap = [
            'HÀ NỘI' => 'Hanoi',
            'ĐÀ NẴNG' => 'Da Nang',
            'TP HỒ CHÍ MINH' => 'Ho Chi Minh',
            'SAPA' => 'Sa Pa',
            'PHÚ QUỐC' => 'Rach Gia',
            'HẠ LONG' => 'Ha Long',
            'NINH BÌNH' => 'Ninh Binh',
            'QUẢNG NAM' => 'Da Nang',
            'VŨNG TÀU' => 'Vung Tau',
            'LÂM ĐỒNG' => 'Da Lat',
            'KHÁNH HÒA' => 'Nha Trang',
            'CÔN ĐẢO' => 'Con Dao',
            'CẦN THƠ' => 'Can Tho',
            'QUẢNG TRỊ' => 'Quang Tri',
            'QUẢNG NINH' => 'Quang Ninh',
            'BÌNH ĐỊNH' => 'Binh Dinh',
        ];

        $normalizedCityMap = collect($cityMap)->mapWithKeys(function ($value, $key) {
            return [\Str::of($key)->lower()->slug('_')->__toString() => $value];
        });

        foreach ($tours as $tour) {
            $originalCity = trim($tour->destination ?? 'Hanoi');
            $normalizedCity = \Str::of($originalCity)->lower()->slug('_')->__toString();

            $city = $normalizedCityMap->get($normalizedCity, $originalCity);
            $cacheKey = 'weather_' . strtolower(str_replace(' ', '_', $city));

            $weatherData = cache()->remember($cacheKey, 3600, function () use ($city, $apiKey) {
                $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                    'q' => $city,
                    'appid' => $apiKey,
                    'units' => 'metric',
                    'lang' => 'vi',
                ]);
                return $response->successful() ? $response->json() : null;
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