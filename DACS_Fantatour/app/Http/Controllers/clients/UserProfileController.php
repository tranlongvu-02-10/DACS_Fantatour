<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }
    protected function getUserId(): mixed
    {
        if (!session()->has(key: 'userId')) {
            $username = session()->get(key: 'username');

            if ($username) {
                $userId = $this->user->getUserId(username: $username);
                session()->put(key: 'userId', value: $userId); // Lưu userId vào session để dùng lại
            }
        }

        return session()->get(key: 'userId');
    }

    public function index(){
        $title = 'Thông tin cá nhân';
        $userId = $this->getUserId();
        $user = $this->user->getUser($userId);
        //dd($userId);
        return view('clients.user-profile',compact('title','user'));
    }
    
    public function update(Request $req)
    {
        $fullName = $req->fullName;
        $address = $req->address;
        $email = $req->email;
        $phone = $req->phone;

        $dataUpdate = [
            'fullName' => $fullName,
            'address' => $address,
            'email' => $email,
            'phoneNumber' => $phone
        ];

        $userId = $this->getUserId();

        $update = $this->user->updateUser($userId, $dataUpdate);
        if (!$update) {
            return response()->json(['error' => true, 'message' => 'Bạn chưa thay đổi thông tin nào, vui lòng kiểm tra lại!']);
        }
        return response()->json(['success' => true, 'message' => 'Cập nhật thông tin thành công!']);
    }
}
