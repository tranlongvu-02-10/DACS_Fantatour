<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\AboutController;
use App\Http\Controllers\clients\ToursController;
use App\Http\Controllers\clients\TravelguidesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/',function () {
//   return view(view: 'home');
//});


Route::get(uri:'/', action: [HomeController::class, 'index'])->name(name: 'home');
Route::get(uri:'/about', action: [AboutController::class, 'index'])->name(name: 'about');
Route::get(uri:'/tours', action: [ToursController::class, 'index'])->name(name: 'tours');
Route::get(uri:'/travel-guides', action: [TravelguidesController::class, 'index'])->name(name: 'travel-guides');