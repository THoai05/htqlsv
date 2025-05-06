<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopSinhvienTable extends Migration
{
    public function up()
    {
        Schema::create('lop_sinhvien', function (Blueprint $table) {
            $table->unsignedBigInteger('lophoc_ID');
            $table->unsignedBigInteger('sinhvien_ID');

            // Tạo khóa chính là tổ hợp của 2 khóa ngoại
            $table->primary(['lophoc_ID', 'sinhvien_ID']);


            // Tùy chọn thêm
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lop_sinhvien');
    }
}
