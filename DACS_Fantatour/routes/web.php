<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\AboutController;
use App\Http\Controllers\clients\BlogController;
use App\Http\Controllers\clients\ToursController;
use App\Http\Controllers\clients\TravelguidesController;
use App\Http\Controllers\clients\DestinationController;
use App\Http\Controllers\clients\ContactController;
use App\Http\Controllers\clients\TourdetaildetailController;
use App\Http\Controllers\clients\BlogDetailController;
use App\Http\Controllers\clients\LoginController;
use App\Http\Controllers\clients\LoginGoogleController;

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

Route::get(uri: '/', action: [HomeController::class, 'index']);
Route::get(uri: '/home', action: [HomeController::class, 'index'])->name(name: 'home');
Route::get(uri:'/about', action: [AboutController::class, 'index'])->name(name: 'about');
Route::get(uri:'/tours', action: [ToursController::class, 'index'])->name(name: 'tours');
Route::get(uri:'/travel-guides', action: [TravelguidesController::class, 'index'])->name(name: 'travel-guides');
Route::get(uri:'/destination', action: [DestinationController::class, 'index'])->name(name: 'destination');
Route::get(uri:'/contact', action: [ContactController::class, 'index'])->name(name: 'contact');
Route::get(uri:'/tours-detail/{id?}', action: [TourdetaildetailController::class, 'index'])->name(name: 'tours-detail');
Route::get(uri:'/blogs', action: [BlogController::class, 'index'])->name(name: 'blogs');
Route::get(uri:'/blog-detail', action: [BlogDetailController::class, 'index'])->name(name: 'blog-detail');


//xử lý đăng nhập
Route::get(uri:'/login', action: [LoginController::class, 'index'])->name(name: 'login');
Route::post(uri:'/register', action: [LoginController::class, 'register'])->name(name: 'register');
Route::post(uri:'/login', action: [LoginController::class, 'login'])->name(name: 'user-login');
Route::get(uri:'/logout', action: [LoginController::class, 'logout'])->name(name: 'logout');
Route::get(uri:'activate-account/{token}', action: [LoginController::class, 'activateAccount'])->name(name: 'activate.account');

//Đăng nhập bằng gg
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
