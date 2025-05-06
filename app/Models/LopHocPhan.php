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

    // Liên kết với bảng MonHoc
    public function monhoc()
    {
        return $this->belongsTo(MonHoc::class, 'mamonhoc', 'id'); // mamonhoc tham chiếu tới id của bảng monhocs
    }

    // Liên kết với bảng GiangVien
    public function giangvien()
    {
        return $this->belongsTo(GiangVien::class, 'giangvien_ID', 'id'); // giangvien_ID tham chiếu tới id của bảng giangviens
    }
    public function sinhviens()
    {
        return $this->belongsToMany(SinhVien::class, 'lop_sinhvien', 'lophoc_ID', 'sinhvien_ID');
    }

    public function diem()
    {
        return $this->hasMany(Diem::class, 'lophoc_ID', 'lophoc_ID');
    }
}
