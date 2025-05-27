<?php

namespace App\Models\clients;

use DeepCopy\Filter\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tours extends Model
{
    use HasFactory;
    protected $table = 'tbl_tourss';

    //Lấy tất cả tour
   public function getAllTours($perPage = 9)
    {

        $allTours = DB::table($this->table)->where('availability', 1)->paginate($perPage);
        foreach ($allTours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourId)->averageRating;
        }

        return $allTours;
    }
    
    //Lấy chi tiết tour
    public function getTourDetail($id)
    {
        $getTourDetail = DB::table($this->table)
            ->where('tourId', $id)
            ->first();

        if ($getTourDetail) {
            // Lấy danh sách hình ảnh thuộc về tour
            $getTourDetail->imagess = DB::table('tbl_imagess')
                ->where('tourId', $getTourDetail->tourId)
                ->limit(5)
                ->pluck('imageURL');

            // Lấy danh sách timeline thuộc về tour
            $getTourDetail->timelinee = DB::table('tbl_timelinee')
                ->where('tourId', $getTourDetail->tourId)
                ->get();
        }


        return $getTourDetail;
    }

    //Lấy khu vực đến Bắc - Trung - Nam
    function getDomain()
    {
        return DB::table($this->table)
            ->select('domain', DB::raw('COUNT(*) as count'))
            ->where('availability', 1)
            ->whereIn('domain', ['b', 't', 'n'])
            ->groupBy('domain')
            ->get();
    }


    //Filter tours
    public function filterTours($filters = [], $sorting = null, $perPage = null)
    {
        DB::enableQueryLog();

        // Khởi tạo truy vấn với bảng tours
        $getTours = DB::table($this->table)
            ->leftJoin('tbl_reviewss', 'tbl_tourss.tourId', '=', 'tbl_reviewss.tourId') // Join với bảng reviews
            ->select(
                'tbl_tourss.tourId',
                'tbl_tourss.title',
                'tbl_tourss.description',
                'tbl_tourss.priceAdult',
                'tbl_tourss.priceChild',
                'tbl_tourss.time',
                'tbl_tourss.destination',
                'tbl_tourss.quantity',
                DB::raw('AVG(tbl_reviewss.rating) as averageRating')
            )
            ->groupBy(
                'tbl_tourss.tourId',
                'tbl_tourss.title',
                'tbl_tourss.description',
                'tbl_tourss.priceAdult',
                'tbl_tourss.priceChild',
                'tbl_tourss.time',
                'tbl_tourss.destination',
                'tbl_tourss.quantity'
            );
        $getTours = $getTours->where('availability', 1);

        if (!empty($filters)) {
            foreach ($filters as $filter) {
                if ($filter[0] !== 'averageRating') {
                    $getTours = $getTours->where($filter[0], $filter[1], $filter[2]);
                }
            }
        }

        // Áp dụng điều kiện về averageRating trong phần HAVING
        if (!empty($filters)) {
            foreach ($filters as $filter) {
                if ($filter[0] === 'averageRating') {
                    $getTours = $getTours->having('averageRating', $filter[1], $filter[2]); // Sử dụng HAVING để lọc averageRating
                }
            }
        }

        if (!empty($sorting) && isset($sorting[0]) && isset($sorting[1])) {
            $getTours = $getTours->orderBy($sorting[0], $sorting[1]);
        }

        // Thực hiện truy vấn để ghi log
        $tours = $getTours->get();

        // In ra câu lệnh SQL đã ghi lại (nếu cần thiết)
        $queryLog = DB::getQueryLog();

        // Lấy danh sách hình ảnh cho mỗi tour
        foreach ($tours as $tour) {
            $tour->images = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
            $tour->rating = $this->reviewStats($tour->tourId)->averageRating;
        }

        // dd($queryLog); // In ra log truy vấn nếu cần thiết
        return $tours;
    }
    public function updateTours($tourId, $data)
    {
        $update = DB::table($this->table)
            ->where('tourId', $tourId)
            ->update($data);

        return $update;
    }

    //Lấy detail tour đã đặt
    public function tourBooked($bookingId, $checkoutId)
    {
        $booked = DB::table($this->table)
            ->join('tbl_bookingg', 'tbl_tourss.tourId', '=', 'tbl_bookingg.tourId')
            ->join('tbl_checkoutt', 'tbl_bookingg.bookingId', '=', 'tbl_checkoutt.bookingId')
            ->where('tbl_bookingg.bookingId', '=', $bookingId)
            ->where('tbl_checkoutt.checkoutId', '=', $checkoutId)
            ->first();

        return $booked;
    }

    //Tạo đánh giá về tours
    public function createReviews($data)
    {
        return DB::table('tbl_reviewss')->insert($data);
    }
    //Lấy danh sách nội dung reviews 
    public function getReviews($id)
    {
        $getReviews = DB::table('tbl_reviewss')
            ->join('tbl_userss', 'tbl_userss.userId', '=', 'tbl_reviewss.userId')
            ->where('tourId', $id)
            ->orderBy('tbl_reviewss.timestamp', 'desc')
            ->take(3)
            ->get();

        return $getReviews;
    }

    //Lấy số lượng đánh giá và số sao trung bình của tour
    public function reviewStats($id)
    {
        $reviewStats = DB::table('tbl_reviewss')
            ->where('tourId', $id)
            ->selectRaw('AVG(rating) as averageRating, COUNT(*) as reviewCount')
            ->first();

        return $reviewStats;
    }
    //Kiểm tra xem người dùng đã đánh giá tour này hay chưa?
    public function checkReviewExist($tourId, $userId)
    {
        return DB::table('tbl_reviewss')
            ->where('tourId', $tourId)
            ->where('userId', $userId)
            ->exists(); // Trả về true nếu bản ghi tồn tại, false nếu không tồn tại
    }
     //Search tours
    public function searchTours($data)
    {
        $tours = DB::table($this->table);


        // Thêm điều kiện cho destination với LIKE
        if (!empty($data['destination'])) {
            $tours->where('destination', 'LIKE', '%' . $data['destination'] . '%');
        }

        // Thêm điều kiện cho startDate và endDate nếu cần so sánh
        if (!empty($data['startDate'])) {
            $tours->whereDate('startDate', '>=', $data['startDate']);
        }
        if (!empty($data['endDate'])) {
            $tours->whereDate('endDate', '<=', $data['endDate']);
        }

        // Thêm điều kiện tìm kiếm với LIKE cho title, time và description
        if (!empty($data['keyword'])) {
            $tours->where(function ($query) use ($data) {
                $query->where('title', 'LIKE', '%' . $data['keyword'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $data['keyword'] . '%')
                    ->orWhere('time', 'LIKE', '%' . $data['keyword'] . '%')
                    ->orWhere('destination', 'LIKE', '%' . $data['keyword'] . '%');
            });
        }

        $tours = $tours->where('availability', 1);
        $tours = $tours->limit(12)->get();

        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourId)->averageRating;
        }
        return $tours;
    }

    //Get tours recommendation
    public function toursRecommendation($ids)
    {

        if (empty($ids)) {
            // Return an empty collection to avoid executing the query with an empty `FIELD` clause
            return collect();
        }

        $toursRecom = DB::table($this->table)
            ->where('availability', '1')
            ->whereIn('tourId', $ids)
            ->orderByRaw("FIELD(tourId, " . implode(',', array_map('intval', $ids)) . ")") // Chuyển tất cả các giá trị sang kiểu int và giữ thứ tự
            ->get();
        foreach ($toursRecom as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourId)->averageRating;
        }

        return $toursRecom;
    }

    //Get tour có số lượng booking và hoàn thành nhiều nhất để gợi ý
    public function toursPopular($quantity)
    {
        $toursPopular = DB::table('tbl_bookingg')
            ->select(
                'tbl_tourss.tourId',
                'tbl_tourss.title',
                'tbl_tourss.description',
                'tbl_tourss.priceAdult',
                'tbl_tourss.priceChild',
                'tbl_tourss.time',
                'tbl_tourss.destination',
                'tbl_tourss.quantity',
                DB::raw('COUNT(tbl_bookingg.tourId) as totalBookings')
            )
            ->join('tbl_tourss', 'tbl_bookingg.tourId', '=', 'tbl_tourss.tourId')
            ->where('tbl_bookingg.bookingStatus', 'f') // Chỉ lấy các booking đã hoàn thành
            ->groupBy(
                'tbl_tourss.tourId',
                'tbl_tourss.title',
                'tbl_tourss.description',
                'tbl_tourss.priceAdult',
                'tbl_tourss.priceChild',
                'tbl_tourss.time',
                'tbl_tourss.destination',
                'tbl_tourss.quantity'
            )
            ->orderBy('totalBookings', 'DESC')
            ->take($quantity)
            ->get();


        foreach ($toursPopular as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourId)->averageRating;
        }
        return $toursPopular;
    }
    //Get id search tours
    public function toursSearch($ids)
    {

        if (empty($ids)) {
            // Return an empty collection to avoid executing the query with an empty `FIELD` clause
            return collect();
        }

        $tourSearch = DB::table($this->table)
            ->where('availability', '1')
            ->whereIn('tourId', $ids)
            ->orderByRaw("FIELD(tourId, " . implode(',', array_map('intval', $ids)) . ")") // Chuyển tất cả các giá trị sang kiểu int và giữ thứ tự
            ->get();
        foreach ($tourSearch as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourId)->averageRating;
        }

        return $tourSearch;
    }

        
}

