<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopSinhVien extends Model
{
    protected $table = 'lop_sinhvien';
    protected $fillable = ['lophoc_ID', 'sinhvien_ID'];

}
