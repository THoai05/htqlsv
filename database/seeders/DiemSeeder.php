<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DiemSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('diem')->insert([
                'sinhvien_ID' => $faker->numberBetween(1, 50), // Giả sử có 50 sinh viên
                'lophoc_ID' => $faker->numberBetween(1, 10),   // Giả sử có 10 lớp học

                'diem_15p_1' => $faker->randomFloat(2, 0, 10),
                'diem_15p_2' => $faker->randomFloat(2, 0, 10),
                'diem_15p_3' => $faker->randomFloat(2, 0, 10),
                'giua_ki' => $faker->randomFloat(2, 0, 10),
                'cuoi_ki' => $faker->randomFloat(2, 0, 10),

                'diem_tb' => $faker->randomFloat(2, 0, 10),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
