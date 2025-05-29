<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ToursModel;
use App\Models\clients\Tours;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ToursManagementController extends Controller
{
    private $tours;

    public function __construct()
    {
        $this->tours = new ToursModel();
    }
    public function index()
    {
        $title = 'Quản lý Tours';

        $tours = $this->tours->getAllTours();
        return view('admin.tours', compact('title', 'tours'));
    }

    public function pageAddTours()
    {
        $title = 'Thêm Tours';

        return view('admin.add-tours', compact('title'));
    }

    public function addTours(Request $request)
    {
        $name = $request->input('name');
        $destination = $request->input('destination');
        $domain = $request->input('domain');
        $quantity = $request->input('number');
        $price_adult = $request->input('price_adult');
        $price_child = $request->input('price_child');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $description = $request->input('description');


        // Chuyển start_date và end_date từ định dạng d/m/Y sang Y-m-d
        $startDate = Carbon::createFromFormat('d/m/Y', $start_date)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('d/m/Y', $end_date)->format('Y-m-d');

        // Tính số ngày giữa start_date và end_date
        $days = Carbon::createFromFormat('Y-m-d', $startDate)->diffInDays(Carbon::createFromFormat('Y-m-d', $endDate));

        // Tính số đêm: số ngày - 1
        $nights = $days - 1;

        // Định dạng thời gian theo kiểu "X ngày Y đêm"
        $time = "{$days} ngày {$nights} đêm";


        $dataTours = [
            'title' => $name,
            'time' => $time,
            'description' => $description,
            'quantity' => $quantity,
            'priceAdult' => $price_adult,
            'priceChild' => $price_child,
            'destination' => $destination,
            'domain' => $domain,
            'availability' => 0,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
        // dd($dataTours);

        $createTour = $this->tours->createTours($dataTours);

        // dd($createTour);
        return response()->json([
            'success' => true,
            'message' => 'Tour added successfully!',
            'tourId' => $createTour
        ]);

    }

    public function addImagesTours(Request $request)
{
    try {
        // Xác thực CSRF token
        if (!$request->has('_token')) {
            return response()->json(['success' => false, 'message' => 'CSRF token missing'], 403);
        }

        // Lấy tourId từ request
        $tourId = $request->input('tourId');
        if (!$tourId) {
            return response()->json(['success' => false, 'message' => 'Tour ID is required'], 400);
        }

        // Kiểm tra tourId có tồn tại trong cơ sở dữ liệu (giả sử có model Tour)
        if (!Tours::find($tourId)) {
            return response()->json(['success' => false, 'message' => 'Invalid Tour ID'], 400);
        }

        // Lấy danh sách file từ input 'image'
        $images = $request->file('image');
        if (!$images) {
            return response()->json(['success' => false, 'message' => 'No files uploaded'], 400);
        }

        // Kiểm tra số lượng file (giới hạn 5 file, tương ứng frontend)
        if (is_array($images) && count($images) > 5) {
            return response()->json(['success' => false, 'message' => 'Maximum 5 files allowed'], 400);
        }

        // Đảm bảo thư mục đích tồn tại
        $destinationPath = public_path('admin/assets/images/gallery-tours/');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Mảng lưu thông tin các file đã upload
        $uploadedFiles = [];

        // Xử lý từng file (hỗ trợ multiple files)
        $images = is_array($images) ? $images : [$images]; // Chuyển thành mảng nếu chỉ có 1 file
        foreach ($images as $image) {
            // Kiểm tra file hợp lệ
            if (!$image->isValid()) { // Kiểm tra isValid() trên từng file
                return response()->json(['success' => false, 'message' => 'Invalid file upload: ' . $image->getClientOriginalName()], 400);
            }

            // Kiểm tra định dạng file
            $extension = strtolower($image->getClientOriginalExtension());
            if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                return response()->json(['success' => false, 'message' => 'Only JPG and PNG files are allowed'], 400);
            }

            // Lấy tên gốc của file
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            // Tạo tên file mới
            $filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName) . '_' . time() . '.' . $extension;

            // Resize hình ảnh
            try {
                $resizedImage = Image::make($image)->resize(400, 350, function ($constraint) {
                    $constraint->aspectRatio(); // Giữ tỷ lệ khung hình
                    $constraint->upsize(); // Ngăn phóng to ảnh nhỏ
                });
                $resizedImage->save($destinationPath . $filename);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Failed to process image: ' . $e->getMessage()], 500);
            }

            // Tạo dữ liệu để lưu vào cơ sở dữ liệu
            $dataUpload = [
                'tourId' => $tourId,
                'imageURL' => $filename,
                'description' => $originalName
            ];

            // Lưu thông tin vào cơ sở dữ liệu
            $uploadImage = $this->tours->uploadImages($dataUpload);

            if (!$uploadImage) {
                return response()->json(['success' => false, 'message' => 'Failed to save image data'], 500);
            }

            $uploadedFiles[] = [
                'filename' => $filename,
                'tourId' => $tourId
            ];
        }

        // Trả về phản hồi cho form HTML (thêm redirect nếu không phải JSON)
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Images uploaded successfully',
                'data' => $uploadedFiles
            ], 200);
        } else {
            return redirect()->back()->with('success', 'Images uploaded successfully');
        }
    } catch (\Exception $e) {
        // Trả về lỗi cho JSON hoặc redirect
        if ($request->expectsJson()) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        } else {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}

    public function addTimeline(Request $request)
    {
        $tourId = $request->tourId;

        // Tạo một mảng chứa các timeline
        $timelines = [];

        // Lặp qua tất cả các keys trong request để tìm các cặp `day-X` và `itinerary-X`
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^day-(\d+)$/', $key, $matches)) {
                $dayNumber = $matches[1]; // Lấy số ngày (X) từ `day-X`

                // Tìm `itinerary-X` tương ứng
                $itineraryKey = "itinerary-{$dayNumber}";
                if ($request->has($itineraryKey)) {
                    $timelines[] = [
                        'tourId' => $tourId,
                        'title' => $value,
                        'description' => $request->input($itineraryKey),
                    ];
                }
            }
        }

        foreach ($timelines as $timeline) {
            $this->tours->addTimeLine($timeline);
        }
        $dataUpdate = [
            'availability' => 1
        ];

        $updateAvailability = $this->tours->updateTour($tourId, $dataUpdate);
        toastr()->success('Thêm tour thành công!');
        return redirect()->route('admin.page-add-tours');
    }

    public function getTourEdit(Request $request)
    {
        $tourId = $request->tourId;

        $getTour = $this->tours->getTour($tourId);
        // Lấy ngày bắt đầu của tour và ngày hiện tại
        $startDate = Carbon::parse($getTour->startDate); // Chuyển đổi ngày bắt đầu sang đối tượng Carbon
        $today = Carbon::now(); // Lấy ngày hiện tại

        // Kiểm tra nếu ngày bắt đầu <= hôm nay
        if ($startDate->lessThanOrEqualTo($today)) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể chỉnh sửa vì tour đã hoặc đang diễn ra.',
            ]);
        }


        $getImages = $this->tours->getImages($tourId);
        $getTimeLine = $this->tours->getTimeLine($tourId);
        if ($getTour) {
            return response()->json([
                'success' => true,
                'tour' => $getTour,
                'images' => $getImages,
                'timeline' => $getTimeLine
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function uploadTempImagesTours(Request $request)
{
    try {
        // Xác thực CSRF token
        if (!$request->has('_token')) {
            return response()->json(['success' => false, 'message' => 'CSRF token missing'], 403);
        }

        // Lấy tourId từ request
        $tourId = $request->input('tourId');
        if (!$tourId) {
            return response()->json(['success' => false, 'message' => 'Tour ID is required'], 400);
        }

        // Kiểm tra tourId có tồn tại trong bảng tbl_tours (đã sửa tên bảng)
        $tour = Tours::where('tourId', $tourId)->first();
        if (!$tour) {
            return response()->json(['success' => false, 'message' => 'Invalid Tour ID'], 400);
        }

        // Kiểm tra và chuẩn hóa dữ liệu file upload
        if (!$request->hasFile('image')) {
            return response()->json(['success' => false, 'message' => 'No files uploaded'], 400);
        }

        $images = $request->file('image');
        $imagesArray = is_array($images) ? $images : [$images]; // Đảm bảo luôn là array

        // Kiểm tra số lượng file
        if (count($imagesArray) > 5) {
            return response()->json(['success' => false, 'message' => 'Maximum 5 files allowed'], 400);
        }

        // Đảm bảo thư mục đích tồn tại
        $destinationPath = public_path('clients/assets/images/gallery-tours/');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $uploadedFiles = [];

        foreach ($imagesArray as $image) {
            // Kiểm tra file hợp lệ
            if (!$image->isValid()) {
                return response()->json(
                    ['success' => false, 'message' => 'Invalid file upload: ' . $image->getClientOriginalName()], 
                    400
                );
            }

            // Kiểm tra định dạng file
            $extension = strtolower($image->getClientOriginalExtension());
            if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                return response()->json(
                    ['success' => false, 'message' => 'Only JPG and PNG files are allowed'], 
                    400
                );
            }

            // Tạo tên file mới
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName) . '_' . time() . '.' . $extension;

            // Resize hình ảnh
            try {
                $resizedImage = Image::make($image)->resize(400, 350, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $resizedImage->save($destinationPath . $filename);
            } catch (\Exception $e) {
                return response()->json(
                    ['success' => false, 'message' => 'Failed to process image: ' . $e->getMessage()], 
                    500
                );
            }

            // Lưu thông tin vào bảng tbl_temp_images (đã sửa tên bảng)
            $result = DB::table('tbl_temp_imagess')->insert([
                'tourId' => $tourId,
                'imageTempURL' => $filename,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (!$result) {
                return response()->json(['success' => false, 'message' => 'Failed to save image data'], 500);
            }

            $uploadedFiles[] = [
                'filename' => $filename,
                'tourId' => $tourId
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'Images uploaded successfully',
            'data' => $uploadedFiles
        ], 200);

    } catch (\Exception $e) {
        Log::error('Upload Image Error:', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
        
        return response()->json(
            ['success' => false, 'message' => 'Server error: ' . $e->getMessage()], 
            500
        );
    }
}
    public function updateTour(Request $request)
    {
        $tourId = $request->tourId;
        $name = $request->input('name');
        $destination = $request->input('destination');
        $domain = $request->input('domain');
        $quantity = $request->input('number');
        $price_adult = $request->input('price_adult');
        $price_child = $request->input('price_child');
        $description = $request->input('description');

        $dataTours = [
            'title'       => $name,
            'description' => $description,
            'quantity'    => $quantity,
            'priceAdult'  => $price_adult,
            'priceChild'  => $price_child,
            'destination' => $destination,
            'domain'      => $domain,
        ];

        $delete_timeline = $this->tours->deleteData($tourId, 'tbl_timelinee');
        $delete_images = $this->tours->deleteData($tourId, 'tbl_imagess');

        $updateTour = $this->tours->updateTour($tourId, $dataTours);

        // Tạo mảng tạm để lưu tên ảnh
        $images = $request->input('images');  // Mảng các tên ảnh gửi lên từ request

        if ($images && is_array($images)) {
            foreach ($images as $image) {
                $dataUpload = [
                    'tourId' => $tourId,
                    'imageURL' => $image, 
                    'description' => $name  
                ];
                $this->tours->uploadImages($dataUpload);
            }
        }

        $timelines = $request->input('timeline');

        if ($timelines && is_array($timelines)) {
            foreach ($timelines as $timeline) {
                $data = [
                    'tourId' => $tourId,
                    'title' => $timeline['title'],
                    'description' => $timeline['itinerary']
                ];

                $this->tours->addTimeLine($data);  // Gọi phương thức addTimeLine()
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Sửa thành công!',
        ]);

    }

    public function deleteTour(Request $request)
    {
        $tourId = $request->tourId;

        $result = $this->tours->deleteTour($tourId);
        $tours = $this->tours->getAllTours();
        // Kiểm tra kết quả trả về từ Model
        if ($result['success']) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'data' => view('admin.partials.list-tours', compact('tours'))->render()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $result['message']
            ]);
        }
    }

}