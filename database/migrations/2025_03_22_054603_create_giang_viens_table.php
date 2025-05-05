<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('giang_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('ma_giang_vien')->unique();
            $table->string('khoa');
            $table->string('email')->unique();
            $table->string('so_dien_thoai');
            $table->unsignedBigInteger('user_id');  // Đảm bảo dùng unsignedBigInteger
            $table->timestamps();

            // Thêm khóa ngoại tham chiếu đến bảng 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('giang_viens');
    }
};
