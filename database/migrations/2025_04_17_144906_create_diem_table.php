<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('diem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sinhvien_ID');  // Đảm bảo là unsignedBigInteger
            $table->unsignedBigInteger('lophoc_ID'); // Đảm bảo là unsignedBigInteger
            $table->decimal('diem', 5, 2);  // Điểm (với 2 chữ số thập phân)
            $table->timestamps();

            // Thêm ràng buộc khóa ngoại
            $table->foreign('sinhvien_id')->references('sinhvien_ID')->on('sinhvien')->onDelete('cascade');
            $table->foreign('lophoc_id')->references('lophoc_ID')->on('lophocphan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('diem');
    }

};
