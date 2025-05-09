<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;

class TourdetaildetailController extends Controller
{
    private $tours;

    public function __construct()
    {
        $this->tours = new Tours();   
    }
    public function index($id= 0)
    {
        $title ='Chi tiết tours';
        $tourDetail = $this->tours->getTourDetail($id);
        //dd($tourDetail);
        return view('clients.tours-detail',compact('title','tourDetail'));
    }
}
