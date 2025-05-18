<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(){
        $title = 'Hồ sơ';
        return view('clients.infor',compact('title'));
    }
}
