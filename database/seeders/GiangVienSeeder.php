<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder as BaseSeeber;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GiangVienSeeder extends BaseSeeber
{
    public function run()
    {
        // Xóa tất cả dữ liệu cũ
        DB::table('giang_viens')->truncate();

        // Chèn dữ liệu mới
        DB::table('giang_viens')->insert([
            [
                'ho_ten' => 'Nguyễn Văn A',
                'ma_giang_vien' => 'GV001',
                'khoa' => 'Công nghệ thông tin',
                'email' => 'nguyenvana@example.com',
                'so_dien_thoai' => '0123456789',
                'user_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ho_ten' => 'Trần Thị B',
                'ma_giang_vien' => 'GV002',
                'khoa' => 'Khoa học máy tính',
                'email' => 'tranthib@example.com',
                'so_dien_thoai' => '0987654321',
                'user_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
