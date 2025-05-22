<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($id)
    {
        $title= 'Booking';
        return view('clients.Booking',compact('title'));
    }
}
