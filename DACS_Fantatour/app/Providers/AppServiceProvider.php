<?php

namespace App\Providers;

use App\Models\admin\ContactModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('admin.blocks.sidebar', function ($view) {
            $contactModel = new ContactModel();
            $unreadData = $contactModel->countContactsUnread(); // Lấy cả số lượng và danh sách thư

            // Chia sẻ số lượng và danh sách thư chưa trả lời vào view sidebar
            $view->with('unreadCount', $unreadData['countUnread']);
            $view->with('unreadContacts', $unreadData['contacts']);
        });
        // Thêm đoạn này để Laravel sử dụng ngôn ngữ từ session
        App::setLocale(Session::get('locale', config('app.locale')));
    }
}