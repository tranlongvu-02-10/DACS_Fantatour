<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ChatBotController extends Controller
{
    public function handle(Request $request)
    {
        $message = trim($request->input('message', ''));
        if (empty($message)) {
            return response()->json(['reply' => 'Ơi bạn ơi, nhắn gì cho mình đi chứ, mình đang chờ nè']);
        }

        $msg = mb_strtolower($message);

        if (preg_match('/\b(chào|hi|hello|hey|alo|bot|hế lô|oi|ê|chào bot|bot ơi)\b/i', $message)) {
            $greet = [
                "Chào bạn iu ơi!!! Hôm nay muốn đi đâu chơi nào? Mình gợi ý tour xịn xò cho nè!",
                "Hi hi bạn đẹp trai/xinh gái ơi! Muốn đi biển, đi núi hay đi ăn chơi nhảy múa nào?",
                "A lô a lô! Có mình đây rồi nè! Bạn đang muốn đi du lịch hả? Kể mình nghe đi nào!",
                "Chào buổi sáng/tối người đẹp! Muốn đi đâu chơi thì cứ nói, mình book tour liền á!"
            ];
            return response()->json(['reply' => $greet[array_rand($greet)]]);
        }

        // TRÍCH XUẤT TỪ KHÓA THÔNG MINH NHẤT
        $clean = $msg;

        // Loại bỏ từ thừa
        $junk = ['đi', 'muốn', 'tôi', 'em', 'cho', 'gợi ý', 'tour', 'đi du lịch', 'giá', 'bao nhiêu', 'có', 'không', 'ở', 'từ', 'đến', 'với', 'mấy', 'là', 'à', 'ạ', 'nhé', 'nha', 'được', 'vào', 'tháng', 'năm', 'năm nay', 'sắp tới', 'muốn đi', 'đi chơi', 'đi đâu', 'đi phú quốc', 'đi đà lạt'];
        foreach ($junk as $word) {
            $clean = str_replace($word, ' ', $clean);
        }

        // Xử lý "3 ngày 2 đêm", "4 ngày", "3n2đ"...
        $duration = null;
        if (preg_match('/(\d+)\s*(ngày|ngay|n|đêm|dem|d)/i', $message, $m)) {
            $duration = $m[1] . " ngày";
            if (strpos($msg, 'đêm') !== false || strpos($msg, 'd') !== false) {
                $duration .= " ... đêm";
            }
        }

        $clean = trim(preg_replace('/\s+/', ' ', $clean));
        $clean = preg_replace('/\b(\d+n?\d*d?)\b/i', '', $clean);
        $clean = trim(preg_replace('/\s+/', ' ', $clean));

        $keywords = [];
        foreach (explode(' ', $clean) as $w) {
            if (mb_strlen($w) > 2 && !is_numeric($w)) {
                $keywords[] = $w;
            }
        }

        // Nếu không hiểu → hỏi lại dễ thương
        if (empty($keywords) && !$duration) {
            return response()->json(['reply' => "Mình chỉ biết tư vấn tour du lịch thôi á\nBạn muốn đi đâu, mấy ngày thì nói mình nha! Ví dụ: Phú Quốc, Đà Lạt 3 ngày, Tour Tết..."]);
        }

        // TÌM TOUR SIÊU CHUẨN
        $query = DB::table('tbl_tourss');

        if (!empty($keywords)) {
            foreach ($keywords as $kw) {
                $like = '%' . $kw . '%';
                $query->where(function($q) use ($like) {
                    $q->whereRaw('LOWER(title) LIKE ?', [$like])
                      ->orWhereRaw('LOWER(destination) LIKE ?', [$like]);
                });
            }
        }

        if ($duration) {
            $query->where('time', 'LIKE', "%{$duration}%");
        }

        $tours = $query->select('tourId', 'title', 'destination', 'time', 'priceAdult', 'startDate')
                       ->orderBy('tourId', 'desc')
                       ->limit(6)
                       ->get();

        // KHÔNG TÌM THẤY → DỄ THƯƠNG
        if ($tours->isEmpty()) {
            $no = [
                "Hic hic, hiện tại mình chưa có tour nào hợp với \"$message\" á",
                "Để mình lục lại lần nữa nha... hiện tại chưa có á",
                "Hơi tiếc xíu là chưa có tour nào đúng ý bạn á\nBạn thử nói lại nha, ví dụ: Phú Quốc, Đà Lạt 3 ngày, Tour Tết..."
            ];
            return response()->json(['reply' => $no[array_rand($no)]]);
        }

        // CÓ TOUR → SIÊU VUI VẺ + LINK CLICK ĐƯỢC
        $list = "";
        foreach ($tours as $i => $t) {
            $url = route('tours-detail', ['id' => $t->tourId]);
            $list .= ($i + 1) . ". <a href=\"$url\" target=\"_blank\">{$t->title}</a>\n";
            $list .= "   Địa điểm: {$t->destination}\n";
            $list .= "   Thời gian: {$t->time}\n";
            $list .= "   Giá chỉ từ: " . number_format($t->priceAdult) . "đ\n";
            $list .= "   Khởi hành: " . date('d/m/Y', strtotime($t->startDate)) . "\n\n";
        }

        $yes = [
            "Tìm được rồi nè bạn ơi!!! Đây là mấy tour hot nhất luôn á!\n\n$list\nNhấn vào tên tour để xem chi tiết nha",
            "Yes yes yes!!! Tour xịn mịn đây rồi!!!\n\n$list\nClick vào tên tour là xem chi tiết liền á",
            "Wow wow wow!!! Có tour đẹp lung linh nè!!!\n\n$list\nThích cái nào thì nhấn vào tên tour nha bạn iu",
            "Đỉnh của chóp luôn nè!!!\n\n$list\nChọn tour nào đi, mình book liền cho!"
        ];

        return response()->json(['reply' => $yes[array_rand($yes)]]);
    }
}