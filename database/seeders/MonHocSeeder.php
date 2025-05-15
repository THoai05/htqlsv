<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MonHocSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        DB::table('mon_hocs')->truncate();
        // Mảng các môn học theo khoa
        $monHocsTheoKhoa = [
            'CNTT' => [
                'Cơ sở dữ liệu',
                'Lập trình web',
                'Hệ điều hành',
                'Mạng máy tính',
                'Cấu trúc dữ liệu và giải thuật',
                'Lập trình di động',
                'Kỹ thuật lập trình',
                'Kỹ thuật phần mềm',
                'Tối ưu hóa'
            ],
            'QTKD' => [
                'Quản trị kinh doanh',
                'Marketing',
                'Kinh tế vĩ mô',
                'Kinh tế vi mô',
                'Quản trị tài chính',
                'Quản trị nhân sự',
                'Chiến lược kinh doanh',
                'Quản lý dự án',
                'Quản trị rủi ro'
            ],
            'Ngoại ngữ' => [
                'Tiếng Anh cơ bản',
                'Tiếng Anh chuyên ngành',
                'Tiếng Nhật',
                'Tiếng Trung Quốc',
                'Tiếng Hàn Quốc',
                'Ngữ pháp tiếng Anh',
                'Kỹ năng giao tiếp tiếng Anh',
                'Dịch thuật',
                'Học thuật ngữ tiếng Anh'
            ],
            'Toán' => [
                'Giải tích 1',
                'Giải tích 2',
                'Xác suất thống kê',
                'Toán rời rạc',
                'Hình học giải tích',
                'Đại số tuyến tính',
                'Lý thuyết đồ thị',
                'Tối ưu hóa',
                'Toán học ứng dụng'
            ]
        ];

        // Lấy danh sách giảng viên có trong bảng giang_viens
        $giangViens = DB::table('giang_viens')->pluck('id')->toArray();

        // Tạo 10 môn học giả
        for ($i = 0; $i < 15; $i++) {
            // Chọn khoa ngẫu nhiên
            $khoa = $faker->randomElement(['CNTT', 'QTKD', 'Ngoại ngữ', 'Toán']);

            // Chọn môn học thuộc khoa đó
            $monHoc = $faker->randomElement($monHocsTheoKhoa[$khoa]);

            DB::table('mon_hocs')->insert([
                'ten_mon_hoc' => $monHoc, // Tên môn học
                'ma_mon_hoc' => 'MH' . str_pad($i + 1, 4, '0', STR_PAD_LEFT), // Mã môn học
                'so_tin_chi' => $faker->numberBetween(2, 4), // Số tín chỉ
                'mo_ta' => $faker->sentence, // Mô tả môn học
                'khoa' => $khoa, // Khoa
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
