<?php

namespace Database\Seeders;

use App\Models\Users;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SinhvienSeeder::class,
            GiangVienSeeder::class,
            MonHocSeeder::class,
            PhongHocSeeder::class,
            LopHocPhanSeeder::class,
            DiemSeeder::class,
        ]);
    }
}
