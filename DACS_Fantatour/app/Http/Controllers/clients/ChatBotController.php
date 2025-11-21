<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use App\Models\clients\Tours;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class ChatBotController extends Controller
{
    public function handle(Request $request)
    {
        try {
            $request->validate(['message' => 'required|string|max:500']);
        } catch (ValidationException $e) {
            return response()->json(['reply' => 'Tin nhắn không hợp lệ.']);
        }

        $message = $request->input('message');

        // Prompt phân tích ý định
        $analysisPrompt = "Phân tích câu hỏi: \"$message\". 
        Trả về JSON chính xác:
        {
          \"destination\": \"Tên địa điểm (Hà Nội, Đà Nẵng...) hoặc null\",
          \"minPrice\": \"Giá tối thiểu (số nguyên) hoặc null\",
          \"maxPrice\": \"Giá tối đa (số nguyên) hoặc null\",
          \"startDate\": \"Ngày khởi hành (YYYY-MM-DD) hoặc null\",
          \"time\": \"Số ngày (ví dụ: 3) hoặc null\"
        }
        Chỉ trả JSON, xử lý synonym và lỗi chính tả.";

        try {
            // ✅ GỌI API PHÂN TÍCH
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->timeout(10)
            ->retry(2, 1000)
            ->post(
                'https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash:generateContent?key=' . config('services.gemini.api_key'),

                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $analysisPrompt]
                            ]
                        ]
                    ]
                ]
            );

            if (!$response->successful()) {
                Log::error('Gemini API error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers()
                ]);

                // Fallback: tìm kiếm bằng model Tours nếu API lỗi
                $tours = (new Tours())->searchTours(['keyword' => $message], 5);
                $reply = $tours->count() > 0
                    ? "Dưới đây là một số tour phù hợp:\n" . $tours->map(fn($tour) => "- {$tour->title} ({$tour->destination}, {$tour->time})")->implode("\n")
                    : "Xin lỗi, không tìm thấy tour phù hợp.";
                return response()->json(['reply' => $reply]);
            }

            // ✅ ĐỌC DỮ LIỆU TRẢ VỀ TỪ GEMINI
            $responseData = $response->json();
            $jsonText = trim($responseData['candidates'][0]['content']['parts'][0]['text'] ?? "{}");
            $filters = json_decode($jsonText, true) ?? [];
            Log::info('Parsed filters', $filters);

            // ✅ TÌM TOUR TRONG DB
            $tours = (new Tours())->searchTours($filters, 5);

            if ($tours->count() > 0) {
                $tourList = "";
                foreach ($tours as $tour) {
                    $tourList .= "- {$tour->title}, Điểm đến: {$tour->destination}, Giá: " . number_format($tour->priceAdult) . " VNĐ, Thời gian: {$tour->time}, Ngày khởi hành: {$tour->startDate}\n";
                }

                $answerPrompt = "Bạn là chatbot hỗ trợ khách hàng du lịch.
                Chỉ được trả lời dựa trên danh sách tour dưới đây và không được nói bất kỳ thông tin nào ngoài phạm vi tour.
                Nếu người dùng hỏi điều không liên quan, chỉ trả lời: 'Xin lỗi, tôi chỉ có thể tư vấn về các tour du lịch trong hệ thống.'

                Câu hỏi: \"$message\"
                Danh sách tour có sẵn trong cơ sở dữ liệu:
                $tourList

                Viết câu trả lời ngắn gọn, thân thiện, chỉ nói về các tour trên.";


                // ✅ GỌI LẠI GEMINI ĐỂ VIẾT TRẢ LỜI (vẫn dùng model 1.5-flash)
                $finalResponse = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->timeout(10)
                ->retry(2, 1000)
                ->post(
                    // ⚠️ đổi endpoint sang model mới
                    'https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash:generateContent?key=' . config('services.gemini.api_key'),

                    [
                        'contents' => [
                            ['parts' => [['text' => $answerPrompt]]]
                        ]
                    ]
                );

                if (!$finalResponse->successful()) {
                    Log::error('Gemini final response error', [
                        'status' => $finalResponse->status(),
                        'body' => $finalResponse->body(),
                        'headers' => $finalResponse->headers()
                    ]);
                    $reply = "Danh sách tour:\n$tourList\nVui lòng xem chi tiết trên website!";
                } else {
                    $finalResponseData = $finalResponse->json();
                    $reply = trim($finalResponseData['candidates'][0]['content']['parts'][0]['text'] ?? "Có lỗi xảy ra.");
                }
            } else {
                 $reply = "Xin lỗi, tôi không tìm thấy tour phù hợp trong hệ thống.Tôi chỉ có thể trả lời về các tour du lịch có sẵn trong cơ sở dữ liệu.";
            }
        } catch (\Exception $e) {
            Log::error('Chatbot error', ['message' => $e->getMessage()]);
            $reply = "Có lỗi xảy ra khi kết nối server. Vui lòng thử lại sau!";
        }

        return response()->json(['reply' => $reply]);
    }
}
