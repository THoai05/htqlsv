<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class LopHocPhanSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\LopHocPhan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $monHocIds = DB::table('mon_hocs')->pluck('id')->toArray();
        $phongHocIds = DB::table('phonghoc')->pluck('phonghoc_ID')->toArray();
        $giangVienIds = DB::table('giang_viens')->pluck('id')->toArray();

        $ngayHocOptions = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6'];

        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            // Chọn tiết bắt đầu theo nhóm hợp lệ
            $tietBatDau = fake()->randomElement([1, 6]);

            // Tiết kết thúc phụ thuộc tiết bắt đầu
            $tietKetThuc = $tietBatDau === 1
                ? fake()->randomElement([3, 5])
                : fake()->randomElement([8, 10]);

            $data[] = [
                'tenlop' => 'Lớp HP ' . $i,
                'mamonhoc' => fake()->randomElement($monHocIds),
                'phonghoc_ID' => fake()->randomElement($phongHocIds),
                'giangvien_ID' => fake()->randomElement($giangVienIds),
                'soluongsv' => 0,
                'thoigianbatdau' => Carbon::now()->addDays(rand(1, 30))->toDateString(),
                'thoigianketthuc' => Carbon::now()->addDays(rand(60, 100))->toDateString(),
                'ngayhoc' => fake()->randomElement($ngayHocOptions),
                'tietbatdau' => $tietBatDau,
                'tietketthuc' => $tietKetThuc,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        DB::table('lophocphan')->insert($data);
    }
}
