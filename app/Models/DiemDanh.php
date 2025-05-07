<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiemDanh extends Model
{
    protected $table = 'diemdanhs';

    protected $fillable = [
        'lophoc_ID',
        'sinhvien_ID',
        'ngay_diem_danh',
        'co_mat',
        'ghi_chu',
    ];

    // Quan hệ với SinhVien
    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'sinhvien_ID', 'sinhvien_ID');
    }

    // Quan hệ với LopHocPhan
    public function lophocphan()
    {
        return $this->belongsTo(LopHocPhan::class, 'lophoc_ID', 'lophoc_ID');
    }
}
