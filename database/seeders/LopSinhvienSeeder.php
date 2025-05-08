<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LopSinhvienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lop_sinhvien')->truncate(); // Xoá dữ liệu cũ nếu cần

        $sinhvienIDs = range(1, 88);
        $usedPairs = [];

        for ($lopID = 1; $lopID <= 30; $lopID++) {
            // Lấy ngẫu nhiên 20 sinh viên không trùng lặp
            $selected = collect($sinhvienIDs)->random(20);

            foreach ($selected as $svID) {
                // Tránh tạo trùng tổ hợp lophoc_ID + sinhvien_ID
                $key = $lopID . '_' . $svID;
                if (isset($usedPairs[$key])) {
                    continue;
                }

                DB::table('lop_sinhvien')->insert([
                    'lophoc_ID' => $lopID,
                    'sinhvien_ID' => $svID,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $usedPairs[$key] = true;
            }
        }
    }
}
