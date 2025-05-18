<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    private $tours;

    public function __construct()
    {
        $this->tours = new Tours();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'tour';
        $tours = $this->tours->getAllTours();
        $domain = $this->tours->getDomain();
          //dd($tours);
        $domainsCount = [
            'mien_bac' => optional($domain->firstWhere('domain', 'b'))->count,
            'mien_trung' => optional($domain->firstWhere('domain', 't'))->count,
            'mien_nam' => optional($domain->firstWhere('domain', 'n'))->count,
        ];
        // Kiểm tra nếu yêu cầu là AJAX
        if ($request->ajax()) {
            return response()->json([
                'tours' => view('clients.partials.filter-tours', compact('tours'))->render(),
            ]);
        }
        return view('clients.tours', compact('title','tours','domainsCount'));
    }

     //Xử lý filter tours
    //Xử lý filter tours
    public function filterTours(Request $req)
    {

        $conditions = [];
        $sorting = [];

        // Handle price filter
        if ($req->filled('minPrice') && $req->filled('maxPrice')) {
            $minPrice = $req->minPrice;
            $maxPrice = $req->maxPrice;
            $conditions[] = ['priceAdult', '>=', $minPrice];
            $conditions[] = ['priceAdult', '<=', $maxPrice];
        }

        // Handle domain filter
        if ($req->filled('domain')) {
            $domain = $req->domain;
            $conditions[] = ['domain', '=', $domain];
        }

        // Handle star rating filter
        if ($req->filled('star')) {
            $star = (int) $req->star;
            $conditions[] = ['averageRating', '=', $star];
        }

        // Handle duration filter
        if ($req->filled('time')) {
            $duration = $req->time;
            $time = [
                '3n2d' => '3 ngày 2 đêm',
                '4n3d' => '4 ngày 3 đêm',
                '5n4d' => '5 ngày 4 đêm'
            ];
            $conditions[] = ['time', '=', $time[$duration]];
        }

        // Xử lý bộ lọc orderby
        if ($req->filled('sorting')) {
            $sortingOption = trim($req->sorting); // Xóa bất kỳ khoảng trắng nào

            // Xử lý các tùy chọn sắp xếp
            if ($sortingOption == 'new') {
                $sorting = ['tourId', 'DESC']; // Sắp xếp theo ngày tạo, cái mới nhất trước
            } elseif ($sortingOption == 'old') {
                $sorting = ['tourId', 'ASC']; // Sắp xếp theo ngày tạo, từ cũ nhất trước
            } elseif ($sortingOption == "hight-to-low") {
                $sorting = ['priceAdult', 'DESC']; // Sắp xếp theo giá giảm dần
            } elseif ($sortingOption == "low-to-high") {
                $sorting = ['priceAdult', 'ASC']; // Sắp xếp theo giá theo thứ tự tăng dần
            }
        }

        // dd($conditions);
        $tours = $this->tours->filterTours($conditions, $sorting);

        // Nếu không được phân trang, giả lập phân trang
        if (!$tours instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $tours = new \Illuminate\Pagination\LengthAwarePaginator(
                $tours, 
                count($tours),
                9,
                1,
                ['path' => url()->current()]
            );
        }

        return view('clients.partials.filter-tours', compact('tours'));

    }
}