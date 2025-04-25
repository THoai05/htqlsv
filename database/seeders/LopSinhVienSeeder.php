<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LopSinhVienSeeder extends Seeder
{
    public function run()
    {
        $sinhvienIDs = range(1, 15); // ID sinh viên từ 1 đến 15

        foreach ($sinhvienIDs as $index => $sinhvienID) {
            // Chia đều cho 2 lớp 31 và 32
            $lophoc_ID = ($index % 2 == 0) ? 31 : 32;

            DB::table('lop_sinhvien')->insert([
                'lophoc_ID' => $lophoc_ID,
                'sinhvien_ID' => $sinhvienID,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
