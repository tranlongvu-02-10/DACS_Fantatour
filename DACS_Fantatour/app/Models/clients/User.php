<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    protected $table = 'tbl_userss';
    public function getUserId($username)
    {
        return DB::table($this->table)
            ->select('userId')
            ->where('username', $username)->value('userId');
    }
    public function getUser($id)
    {
        $users = DB::table($this->table)
            ->where('userId', $id)->first();

        return $users;
    }
    public function updateUser($id,$data)
    {
        $update = DB::table($this->table)
            ->where('userid',$id)
            ->update($data);

        return $update;
    }
    public function getMyTours($id)
    {
        $myTours =  DB::table('tbl_bookingg')
        ->join('tbl_tourss', 'tbl_bookingg.tourId', '=', 'tbl_tourss.tourId')
        ->join('tbl_checkoutt', 'tbl_bookingg.bookingId', '=', 'tbl_checkoutt.bookingId')
        ->where('tbl_bookingg.userId', $id)
        ->orderByDesc('tbl_bookingg.bookingDate')
        ->take(3)
        ->get();

        foreach ($myTours as $tour) {
            // Lấy rating từ tbl_reviews cho mỗi tour
            $tour->rating = DB::table('tbl_reviewss')
                ->where('tourId', $tour->tourId)
                ->where('userId', $id)
                ->value('rating'); // Dùng value() để lấy giá trị rating
        }
        foreach ($myTours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('tbl_imagess')
                ->where('tourId', $tour->tourId)
                ->pluck('imageURL');
        }

        return $myTours;
    }
}
