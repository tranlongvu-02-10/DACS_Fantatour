<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Booking;
use App\Models\clients\Tours;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $tour;
    private $booking;

    public function __construct()
    {
        parent::__construct(); // Gọi constructor của Controller để khởi tạo $user
        $this->tour = new Tours();
        $this->booking = new Booking();

    }
    public function index($id)
    {
        $title= 'Booking';
        $tour = $this->tour->getTourDetail($id);
        //dd($tour);
        return view('clients.Booking',compact('title', 'tour'));
    }

    public function createBooking(Request $req)
    {
         //dd($req);
        $address = $req->input('address');
        $email = $req->input('email');
        $fullName = $req->input('fullName');
        $numAdults = $req->input('numAdults');
        $numChildren = $req->input('numChildren');
        $paymentMethod = $req->input('payment_hidden');
        $tel = $req->input('tel');
        $totalPrice = $req->input('totalPrice');
        $tourId = $req->input('tourId');
        $userId = $this->getUserId();

        $dataBooking = [
            'tourId' => $tourId,
            'userId' => $userId,
            'address' => $address,
            'fullName' => $fullName,
            'email' => $email,
            'numAdults' => $numAdults,
            'numChildren' => $numChildren,
            'phoneNumber' => $tel,
            'totalPrice' => $totalPrice
        ];
        //dd($dataBooking);
        $booking = $this->booking->createBooking($dataBooking);
        if(!$booking)
        {
            toastr()->error('Có vấn đề khi đặt tour!');
            return redirect()->back();
        }
        toastr()->success('Đặt tour thành công!');
        return redirect()->route('tours');
    }
}
