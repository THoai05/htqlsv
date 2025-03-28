<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('phonghoc', function (Blueprint $table) {
            $table->bigIncrements('phonghoc_ID'); // Tạo khóa chính tự tăng kiểu BIGINT
            $table->string('tenphonghoc');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phonghoc');
    }
};
