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
        DB::table('sinhvien')->truncate();

        foreach (range(13, 100) as $userId) {
            Sinhvien::create([
                'hoten' => $faker->name,
                'mssv' => 'SV' . str_pad($userId, 4, '0', STR_PAD_LEFT),
                'email' => $faker->unique()->safeEmail,
                'sdt' => $faker->unique()->numerify('0#########'),
                'cccd' => $faker->unique()->numerify('0############'),
                'ngaysinh' => $faker->date('Y-m-d', '2005-01-01'),
                'gioitinh' => $faker->randomElement(['Nam', 'Nữ']),
                'dantoc' => $faker->randomElement(['Kinh', 'Khác']),
                'tongiao' => $faker->randomElement(['Có', 'Không']),
                'noisinh' => $faker->city, // Nơi sinh
                'tinhtrang' => 'Còn học',
                'user_id' => $userId,
            ]);
        }
    }
}
