<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Home extends Model
{
    use HasFactory;

    protected $table = 'tbl_tourss';

    public function getHomeTours()
    {
        // Lấy thông tin tour
        $tours = DB::table($this->table)
            ->get();

        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->imagess = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
            
            // Lấy danh sách timeline thuộc về tour
            //$tour->timelinee = DB::table('tbl_timelinee')
                //->where('tourId', $tour->tourId)
                //->pluck('title');
   
        }

        return $tours;  
    }
}
