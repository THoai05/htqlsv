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
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('giang_viens');
    }
};
