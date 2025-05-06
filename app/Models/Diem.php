<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác với tên mặc định của Laravel
    protected $table = 'diem';

    // Các trường có thể mass-assignable
    protected $fillable = [
        'sinhvien_ID',
        'lophoc_ID',
        'diem',
    ];

    // Định nghĩa quan hệ với model SinhVien
    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'sinhvien_ID', 'sinhvien_ID');
    }

    // Định nghĩa quan hệ với model LopHocPhan
    public function lophocphan()
    {
        return $this->belongsTo(LopHocPhan::class, 'lophoc_ID', 'lophoc_ID');
    }
}

