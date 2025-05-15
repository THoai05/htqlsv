<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sinhvien extends Model
{
    use HasFactory;

    protected $table = 'sinhvien'; // Tên bảng

    protected $primaryKey = 'sinhvien_ID'; // Khóa chính

    public $incrementing = true; // Nếu là auto-increment thì cần khai báo

    protected $keyType = 'int'; // Đảm bảo khóa chính là số nguyên

    protected $fillable = [
        'hoten',
        'mssv',
        'khoa',
        'email',
        'sdt',
        'cccd',         // Thêm cccd vào fillable
        'ngaysinh',      // Thêm ngaysinh vào fillable
        'gioitinh',      // Thêm gioitinh vào fillable
        'dantoc',        // Thêm dantoc vào fillable
        'tongiao',       // Thêm tongiao vào fillable
        'noisinh',       // Thêm noisinh vào fillable
        'khoa',
        'tinhtrang',
        'user_id'      // Thêm tinhtrang vào fillable
    ];

    public function lopHocPhans()
    {
        return $this->belongsToMany(LopHocPhan::class, 'lop_sinhvien', 'sinhvien_ID', 'lophoc_ID');
    }

    public function diemDanh()
    {
        return $this->hasMany(DiemDanh::class, 'sinhvien_ID', 'sinhvien_ID');
    }
}
