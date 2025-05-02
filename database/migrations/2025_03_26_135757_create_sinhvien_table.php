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
            $table->string('mssv', 50)->unique();  // Giới hạn độ dài
            $table->string('email', 100)->unique();
            $table->string('sdt', 15)->unique();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sinhvien');
    }
};
