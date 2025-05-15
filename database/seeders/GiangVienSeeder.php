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

        GiangVien::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $ho = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Phan', 'Vũ', 'Đặng', 'Bùi', 'Đỗ'];
        $ten = ['Anh', 'Bình', 'Châu', 'Dũng', 'Giang', 'Hà', 'Hải', 'Hân', 'Hòa', 'Hùng', 'Khánh', 'Lan', 'Linh', 'Minh', 'Nam', 'Ngọc', 'Nhung', 'Phương', 'Quang', 'Sơn', 'Tâm', 'Thảo', 'Thành', 'Trang', 'Tuấn', 'Việt', 'Yến'];

        foreach (range(3, 12) as $userId) {
            $hoTenVietNam = $faker->randomElement($ho) . ' ' . $faker->randomElement($ten) . ' ' . $faker->randomElement($ten);
            GiangVien::create([
                'ho_ten' => $hoTenVietNam,
                'ma_giang_vien' => 'GV' . str_pad($userId, 4, '0', STR_PAD_LEFT),
                'khoa' => $faker->randomElement(['CNTT', 'QTKD', 'Tiếng', 'Toán']),
                'email' => $faker->unique()->safeEmail,
                'so_dien_thoai' => $faker->numerify('09########'),
                'user_id' => $userId,
            ]);
        }
    }
}
