<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use App\Models\clients\Tours;  // Đảm bảo đúng đường dẫn model của bạn
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ChatBotController extends Controller
{
    public function handle(Request $request)
    {
        $message = trim($request->message ?? '');

        if (empty($message)) {
            return response()->json(['reply' => 'Bạn ơi gửi tin nhắn cho mình với nào!']);
        }

        // Chào hỏi nhanh
        if (preg_match('/\b(chào|hi|hello|hey|alo|bot|hế lô)\b/i', $message)) {
            return response()->json(['reply' => "Chào bạn! Mình là trợ lý Tourista đây ạ\nBạn muốn tìm tour đi đâu, mấy ngày, giá bao nhiêu thì cứ nói mình nhé!"]);
        }

        // Bước 1: Tìm kiếm thông minh theo từ khóa (title, destination, province nếu có)
        $keyword = mb_strtolower($message);

        $tours = Tours::where('status', 1) // chỉ lấy tour đang hoạt động
            ->where(function($q) use ($keyword) {
                $q->whereRaw('LOWER(title) LIKE ?', ["%$keyword%"])
                  ->orWhereRaw('LOWER(destination) LIKE ?', ["%$keyword%"]);
                  // Nếu bạn có cột province thì thêm dòng này:
                  // ->orWhereRaw('LOWER(province) LIKE ?', ["%$keyword%"]);
            })
            ->orderBy('startDate', 'asc')
            ->limit(6)
            ->get();

        // Nếu không tìm thấy → gợi ý
        if ($tours->isEmpty()) {
            return response()->json(['reply' => "Xin lỗi bạn, mình chưa tìm thấy tour nào phù hợp với \"$message\".\n\nBạn thử nói rõ hơn nhé, ví dụ:\n• Tour Đà Lạt\n• Tour Phú Quốc 4 ngày\n• Tour miền Bắc\n• Tour dưới 10 triệu"]);
        }

        // Có tour → format đẹp
        $list = "";
        foreach ($tours as $t) {
            $list .= "• {$t->title}\n";
            $list .= "  Địa điểm: {$t->destination}\n";
            $list .= "  Thời gian: {$t->time}\n";
            $list .= "  Giá: " . number_format($t->priceAdult) . "đ\n";
            $list .= "  Khởi hành: " . \Carbon\Carbon::parse($t->startDate)->format('d/m/Y') . "\n\n";
        }

        return response()->json([
            'reply' => "Mình tìm được " . $tours->count() . " tour phù hợp đây ạ!\n\n$list\nBạn thích tour nào thì nói mình để tư vấn chi tiết hơn nhé!"
        ]);
    }
}