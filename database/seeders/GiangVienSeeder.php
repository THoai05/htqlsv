<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiangVien;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GiangVienSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate bảng giảng viên
        GiangVien::truncate();

        // Bật lại ràng buộc khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Gán user_id từ 3 đến 10
        foreach (range(3, 12) as $userId) {
            GiangVien::create([
                'ho_ten' => $faker->name,
                'ma_giang_vien' => 'GV' . str_pad($userId, 4, '0', STR_PAD_LEFT),
                'khoa' => $faker->randomElement(['CNTT', 'QTKD', 'Ngoại ngữ', 'Toán']),
                'email' => $faker->unique()->safeEmail,
                'so_dien_thoai' => $faker->numerify('09########'),
                'user_id' => $userId,
            ]);
        }
    }
}
