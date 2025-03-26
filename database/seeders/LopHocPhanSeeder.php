<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LopHocPhan;

class LopHocPhanSeeder extends Seeder
{
    public function run()
    {
        LopHocPhan::insert([
            [
                'tenlop' => 'Lập trình PHP A',
                'mamonhoc' => 1,         // Giả sử "Lập trình PHP" có id = 1 trong bảng monhocs
                'phonghoc_ID' => 1,         // Giả sử phòng học có id = 1 trong bảng phonghocs
                'giangvien_ID' => 1,         // Giảng viên có id = 1 trong bảng giangviens
                'soluongsv' => 50,
                'thoigianbatdau' => '2025-04-01',
                'thoigianketthuc' => '2025-07-01',
                'ngayhoc' => 'Thứ 2, Thứ 4',
                'tietbatdau' => 1,
                'tietketthuc' => 3
            ],
            [
                'tenlop' => 'Lập trình PHP B',
                'mamonhoc' => 1,
                'phonghoc_ID' => 2,
                'giangvien_ID' => 1,
                'soluongsv' => 45,
                'thoigianbatdau' => '2025-04-01',
                'thoigianketthuc' => '2025-07-01',
                'ngayhoc' => 'Thứ 2, Thứ 4',
                'tietbatdau' => 4,
                'tietketthuc' => 6
            ],
            [
                'tenlop' => 'Cơ sở dữ liệu A',
                'mamonhoc' => 2,         // Giả sử "Cơ sở dữ liệu" có id = 2
                'phonghoc_ID' => 3,
                'giangvien_ID' => 2,
                'soluongsv' => 40,
                'thoigianbatdau' => '2025-04-01',
                'thoigianketthuc' => '2025-07-01',
                'ngayhoc' => 'Thứ 3, Thứ 5',
                'tietbatdau' => 1,
                'tietketthuc' => 3
            ],
            [
                'tenlop' => 'Cơ sở dữ liệu B',
                'mamonhoc' => 2,
                'phonghoc_ID' => 4,
                'giangvien_ID' => 2,
                'soluongsv' => 35,
                'thoigianbatdau' => '2025-04-01',
                'thoigianketthuc' => '2025-07-01',
                'ngayhoc' => 'Thứ 3, Thứ 5',
                'tietbatdau' => 4,
                'tietketthuc' => 6
            ]
        ]);
    }
}
