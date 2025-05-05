<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Xóa dữ liệu cũ (nếu cần)
        DB::table('users')->truncate();

        // 1. Tạo 2 admin
        for ($i = 1; $i <= 2; $i++) {
            DB::table('users')->insert([
                'username' => 'admin0' . $i,
                'password' => Hash::make('123456'), // mật khẩu mặc định
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. Tạo 10 giảng viên
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'username' => 'giangvien' . $i,
                'password' => Hash::make('123456'),
                'role' => 'giangvien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3. Tạo 88 sinh viên
        for ($i = 1; $i <= 88; $i++) {
            DB::table('users')->insert([
                'username' => 'sinhvien' . $i,
                'password' => Hash::make('123456'),
                'role' => 'sinhvien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
