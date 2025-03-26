<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongHoc extends Model
{
    use HasFactory;

    protected $table = 'phonghoc';           // Tên bảng trong database
    protected $primaryKey = 'phonghoc_ID';     // Khóa chính là phonghoc_ID
    public $incrementing = true;               // Khóa chính tự tăng
    protected $keyType = 'int';                // Kiểu của khóa chính là số nguyên

    protected $fillable = [
        'tenphonghoc'
    ];

    // Quan hệ: 1 Phòng Học có nhiều lớp học phần
    public function lophocphans()
    {
        return $this->hasMany(LopHocPhan::class, 'phonghoc_ID', 'phonghoc_ID');
    }
}
