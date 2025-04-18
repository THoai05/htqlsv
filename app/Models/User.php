<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Tên bảng trong database

    protected $primaryKey = 'user_ID'; // Định danh khóa chính

    public $incrementing = true; // Đảm bảo đây là auto-increment
    protected $keyType = 'int'; // Kiểu dữ liệu của khóa chính
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
    // để dùng username thay vì email làm định dạng đăng nhập
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
