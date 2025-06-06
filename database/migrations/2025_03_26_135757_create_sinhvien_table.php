<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sinhvien', function (Blueprint $table) {
            $table->id('sinhvien_ID'); // Khóa chính
            $table->string('hoten');
            $table->string('khoa');
            $table->string('mssv', 50)->unique();  // Giới hạn độ dài
            $table->string('email', 100)->unique();
            $table->string('sdt', 50)->unique();
            $table->string('cccd', 20)->unique(); // Số căn cước công dân
            $table->date('ngaysinh'); // Ngày sinh
            $table->enum('gioitinh', ['Nam', 'Nữ']); // Giới tính
            $table->enum('dantoc', ['Kinh', 'Khác'])->default('Kinh'); // Dân tộc
            $table->enum('tongiao', ['Có', 'Không'])->default('Không'); // Tôn giáo
            $table->string('noisinh'); // Nơi sinh
            $table->string('tinhtrang')->default('Còn học'); // Tình trạng
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sinhvien');
    }
};
