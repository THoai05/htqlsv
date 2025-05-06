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

    protected $fillable = ['hoten', 'mssv', 'email', 'sdt'];

    public function lopHocPhans()
    {
        return $this->belongsToMany(LopHocPhan::class, 'lop_hoc_phan_sinhvien', 'sinhvien_ID', 'lophoc_ID');
    }
}



