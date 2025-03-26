<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lophocphan', function (Blueprint $table) {
            $table->id('lophoc_ID'); // Khóa chính
            $table->string('tenlop', 100); // Tên lớp học phần

            // Khóa ngoại
            $table->unsignedBigInteger('mamonhoc');
            $table->unsignedBigInteger('phonghoc_ID');
            $table->unsignedBigInteger('giangvien_ID');

            // Thông tin lớp học
            $table->integer('soluongsv');
            $table->date('thoigianbatdau');
            $table->date('thoigianketthuc');
            $table->string('ngayhoc', 50); // VD: "Thứ 2, Thứ 3"
            $table->integer('tietbatdau');
            $table->integer('tietketthuc');

            $table->timestamps();

            // Định nghĩa khóa ngoại
            $table->foreign('mamonhoc')->references('id')->on('mon_hocs')->onDelete('cascade');
            $table->foreign('phonghoc_ID')->references('phonghoc_ID')->on('phonghoc')->onDelete('cascade');
            $table->foreign('giangvien_ID')->references('id')->on('giang_viens')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lophocphan');
    }
};
