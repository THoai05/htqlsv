<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PhongHocSeeder extends Seeder
{
    public function run(): void
    {
        $phongs = [];

        for ($i = 1; $i <= 10; $i++) {
            $phongs[] = [
                'tenphonghoc' => 'Phòng ' . chr(64 + $i) . rand(1, 3), // VD: Phòng A1, B2,...
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('phonghoc')->insert($phongs);
    }
}
