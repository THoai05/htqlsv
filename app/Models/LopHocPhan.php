<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocPhan extends Model
{
    use HasFactory;

    protected $table = 'lophocphan';
    protected $primaryKey = 'lophoc_ID';
    protected $fillable = [
        'tenlop',
        'mamonhoc',
        'phonghoc_ID',
        'giangvien_ID',
        'soluongsv',
        'thoigianbatdau',
        'thoigianketthuc',
        'ngayhoc',
        'tietbatdau',
        'tietketthuc'
    ];

    // Liên kết với bảng PhongHoc
    public function phonghoc()
    {
        return $this->belongsTo(PhongHoc::class, 'phonghoc_ID', 'phonghoc_ID');
    }

    // Cập nhật quan hệ với bảng MonHoc
    public function monhoc()
    {
        return $this->belongsTo(MonHoc::class, 'mamonhoc', 'id'); // 'mamonhoc' là khóa ngoại tham chiếu tới 'id' trong bảng 'mon_hocs'
    }

    // Cập nhật quan hệ với bảng GiangVien
    public function giangvien()
    {
        return $this->belongsTo(GiangVien::class, 'giangvien_ID', 'id'); // 'giangvien_ID' là khóa ngoại tham chiếu tới 'id' trong bảng 'giang_viens'
    }

    // Liên kết với bảng SinhVien (many-to-many)
    public function sinhviens()
    {
        return $this->belongsToMany(Sinhvien::class, 'lop_sinhvien', 'lophoc_ID', 'sinhvien_ID');
    }

    public function diem()
    {
        return $this->hasMany(Diem::class, 'lophoc_ID', 'lophoc_ID');
    }

    public function diemDanh()
    {
        return $this->hasMany(DiemDanh::class, 'lophoc_ID', 'lophoc_ID');
    }
}
