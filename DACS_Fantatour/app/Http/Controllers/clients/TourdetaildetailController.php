<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TourdetaildetailController extends Controller
{
    private $tours;

    public function __construct()
    {
        parent::__construct(); // Gọi constructor của Controller để khởi tạo $user
        $this->tours = new Tours();
    }
     public function index($id = 0)
{
    $title = 'Chi tiết tours';
    $userId = $this->getUserId();

    $tourDetail = $this->tours->getTourDetail($id);
    $getReviews = $this->tours->getReviews($id);
    $reviewStats = $this->tours->reviewStats($id);

    $avgStar = round($reviewStats->averageRating ?? 0);
    $countReview = $reviewStats->reviewCount ?? 0;

    $checkReviewExist = $this->tours->checkReviewExist($id, $userId);
    $checkDisplay = $checkReviewExist ? 'hide' : '';

    // === GỌI API FLASK – ĐÃ FIX HOÀN TOÀN CHO DỰ ÁN CỦA BẠN ===
$tourRecommendations = collect();

try {
    $response = Http::timeout(8)->get('http://127.0.0.1:5555/api/tour-recommendations', [
        'tour_id' => $id
    ]);

    if ($response->successful()) {
        $json = $response->json();

        if (isset($json['related_tours']) && is_array($json['related_tours'])) {
            foreach ($json['related_tours'] as $item) {
                $tour = $this->tours->getTourById($item['tourId'] ?? null);

                if ($tour) {
                    // Thêm ảnh
                    $imgPath = public_path("clients/assets/images/gallery-tours/{$tour->tourId}_1.jpg");
                    $tour->images = [file_exists($imgPath) ? "{$tour->tourId}_1.jpg" : 'default.jpg'];

                    // Rating
                    $stats = $this->tours->reviewStats($tour->tourId);
                    $tour->rating = $stats->averageRating ?? 4.5;

                    $tourRecommendations->push($tour);
                }
            }
        }
    }
} catch (\Exception $e) {
    Log::error("API Flask lỗi: " . $e->getMessage());
}

// === FALLBACK MẠNH NHẤT – LUÔN CÓ TOUR ===
if ($tourRecommendations->isEmpty()) {
    $allTours = $this->tours->getAllTours(); // ← BẮT BUỘC LÀ COLLECTION

    $tourRecommendations = $allTours
        ->where('tourId', '!=', $id)
        ->where('availability', '>', 0)
        ->shuffle()
        ->take(6);
}

    return view('clients.tours-detail', compact(
        'title', 'tourDetail', 'getReviews', 'avgStar', 'countReview',
        'checkDisplay', 'tourRecommendations'
    ));
}

    public function reviews(Request $req)
    {
        // dd($req);
        $userId = $this->getUserId();
        $tourId = $req->tourId;
        $message = $req->message;
        $star = $req->rating;

        $dataReview = [
            'tourId' => $tourId,
            'userId' => $userId,
            'comment' => $message,
            'rating' => $star
        ];

        $rating = $this->tours->createReviews($dataReview);
        if (!$rating) {
            return response()->json([
                'error' => true
            ], 500);
        }
        $tourDetail = $this->tours->getTourDetail($tourId);
        $getReviews = $this->tours->getReviews($tourId);
        $reviewStats = $this->tours->reviewStats($tourId);

        $avgStar = round($reviewStats->averageRating);
        $countReview = $reviewStats->reviewCount;

        // Trả về phản hồi thành công
        return response()->json([
            'success' => true,
            'message' => 'Đánh giá của bạn đã được gửi thành công!',
            'data' => view('clients.partials.reviews', compact('tourDetail', 'getReviews', 'avgStar', 'countReview'))->render()
        ], 200);
    }
}
