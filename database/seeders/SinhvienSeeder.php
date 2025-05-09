<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sinhvien;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SinhvienSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Sinhvien::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $ho = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Phan', 'Vũ', 'Đặng', 'Bùi', 'Đỗ'];
        $ten = ['Anh', 'Bình', 'Châu', 'Dũng', 'Giang', 'Hà', 'Hải', 'Hân', 'Hòa', 'Hùng', 'Khánh', 'Lan', 'Linh', 'Minh', 'Nam', 'Ngọc', 'Nhung', 'Phương', 'Quang', 'Sơn', 'Tâm', 'Thảo', 'Thành', 'Trang', 'Tuấn', 'Việt', 'Yến'];
        $noisinh = ['Hà Nội', 'TP Hồ Chí Minh', 'Đà Nẵng', 'Hải Phòng', 'Cần Thơ', 'Huế', 'Bình Dương', 'Đồng Nai', 'Bắc Ninh', 'Quảng Ninh'];

        foreach (range(13, 100) as $userId) {
            $hoten = $faker->randomElement($ho) . ' ' . $faker->randomElement($ten) . ' ' . $faker->randomElement($ten);
            Sinhvien::create([
                'hoten' => $hoten,
                'mssv' => 'SV' . str_pad($userId, 4, '0', STR_PAD_LEFT),
                'email' => $faker->unique()->safeEmail,
                'sdt' => $faker->unique()->numerify('0#########'),
                'cccd' => $faker->unique()->numerify('0############'),
                'ngaysinh' => $faker->date('Y-m-d', '2005-01-01'),
                'gioitinh' => $faker->randomElement(['Nam', 'Nữ']),
                'dantoc' => $faker->randomElement(['Kinh', 'Khác']),
                'tongiao' => $faker->randomElement(['Có', 'Không']),
                'noisinh' => $faker->randomElement($noisinh),
                'khoa' => $faker->randomElement(['CNTT', 'QTKD', 'Ngoại ngữ', 'Toán']),
                'tinhtrang' => 'Còn học',
                'user_id' => $userId,
            ]);
        }
    }
}
