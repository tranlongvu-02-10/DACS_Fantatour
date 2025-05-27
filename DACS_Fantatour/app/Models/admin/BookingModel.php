<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_bookingg';

    public function getBooking(){

        $list_booking = DB::table($this->table)
        ->join('tbl_tourss', 'tbl_tourss.tourId', '=', 'tbl_bookingg.tourId')
        ->join('tbl_checkoutt', 'tbl_bookingg.bookingId', '=', 'tbl_checkoutt.bookingId')
        ->orderByDesc('bookingDate')
        ->get();

        return $list_booking;
    }

    public function updateBooking($bookingId, $data){
        return DB::table($this->table)
        ->where('bookingId',$bookingId)
        ->update($data);
    }

    public function getInvoiceBooking($bookingId){

        $invoice = DB::table($this->table)
        ->join('tbl_tourss', 'tbl_tourss.tourId', '=', 'tbl_bookingg.tourId')
        ->join('tbl_checkoutt', 'tbl_bookingg.bookingId', '=', 'tbl_checkoutt.bookingId')
        ->where('tbl_bookingg.bookingId', $bookingId)
        ->first();

        return $invoice;
    }

    public function updateCheckout($bookingId, $data){
        return DB::table('tbl_checkoutt')
        ->where('bookingId',$bookingId)
        ->update($data);
    }
}