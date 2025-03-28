<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tạo 1 tài khoản admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Tạo 10 tài khoản giảng viên
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'username' => 'giangvien' . $i,
                'password' => Hash::make('password123'),
                'role' => 'giangvien',
            ]);
        }

        // Tạo 20 tài khoản sinh viên
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'username' => 'sinhvien' . $i,
                'password' => Hash::make('password123'),
                'role' => 'sinhvien',
            ]);
        }
    }
}
