<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Kiểm tra nếu cột 'user_id' chưa tồn tại mới thêm
        if (!Schema::hasColumn('sinhvien', 'user_id')) {
            Schema::table('sinhvien', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->after('sdt');
            });
        }
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
