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
    public function getAllTours()
    { 
        $allTours = DB::table($this->table)->get();
        foreach ($allTours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->imagess = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
   
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

        
}

