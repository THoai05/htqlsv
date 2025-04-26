<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiangVien extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'giang_viens';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'ho_ten',
        'ma_giang_vien',
        'khoa',
        'email',
        'so_dien_thoai',
        'user_id'
    ];

    public function monhocs()
    {
        return $this->hasMany(MonHoc::class, 'giang_vien_id', 'id');
    }

    public function lophocphans()
    {
        return $this->hasMany(LopHocPhan::class, 'giangvien_ID', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

