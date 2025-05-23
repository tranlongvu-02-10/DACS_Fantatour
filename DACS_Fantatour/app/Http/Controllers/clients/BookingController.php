<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $tour;
    public function __construct()
    {
        $this->tour = new Tours();

    }
    public function index($id)
    {
        $title= 'Booking';
        $tour = $this->tour->getTourDetail($id);
        //dd($tour);
        return view('clients.Booking',compact('title', 'tour'));
    }
}
