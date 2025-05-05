<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sinhvien', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('sdt')->nullable();

            // Thêm liên kết với bảng users nếu muốn
            $table->foreign('user_id')->references('user_ID')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sinhvien', function (Blueprint $table) {
            //
        });
    }
};
