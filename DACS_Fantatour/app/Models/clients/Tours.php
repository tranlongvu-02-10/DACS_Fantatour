<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tours extends Model
{
    use HasFactory;
    protected $table = 'tbl_Tourss';

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
        
}

