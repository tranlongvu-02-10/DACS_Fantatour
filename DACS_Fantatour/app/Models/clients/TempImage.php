<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;

class TempImage extends Model
{
    // Nếu tên bảng không phải dạng số nhiều chuẩn (images), bạn cần chỉ rõ
    protected $table = 'tbl_temp_imagess';

    // Khóa chính của bảng
    protected $primaryKey = 'id';

    // Cho phép gán các trường sau
    protected $fillable = [
        'tourId',
        'imageTempURL',
    ];

    // Tắt timestamps nếu bảng không có created_at, updated_at
    public $timestamps = false;

    // Quan hệ ngược lại với Tours
    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tourId', 'tourId');
    }
}
