<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diemdanhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lophoc_ID');
            $table->unsignedBigInteger('sinhvien_ID');
            $table->date('ngay')->default(DB::raw('CURRENT_DATE'));
            $table->boolean('co_mat')->default(false); // true = có mặt, false = vắng
            $table->timestamps();

            $table->unique(['lophoc_ID', 'sinhvien_ID', 'ngay']); // tránh trùng điểm danh cùng ngày
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diemdanhs');
    }
};
