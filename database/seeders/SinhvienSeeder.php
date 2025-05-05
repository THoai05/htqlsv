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
                'sdt' => $faker->numerify('0#########'), // VD: 0912345678
                'user_id' => $userId,
            ]);
        }
    }
}
