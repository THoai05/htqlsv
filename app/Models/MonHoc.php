<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonHoc extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mon_hocs';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'ten_mon_hoc',
        'ma_mon_hoc',
        'so_tin_chi',
        'giang_vien_id',
        'mota'
    ];

    public function giangvien()
    {
        return $this->belongsTo(GiangVien::class, 'giang_vien_id', 'id');
    }

    public function lophocphans()
    {
        return $this->hasMany(LopHocPhan::class, 'mamonhoc', 'id');
    }
}

