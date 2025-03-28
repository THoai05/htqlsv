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
    Schema::table('giang_viens', function (Blueprint $table) {
        $table->softDeletes(); // Tạo cột deleted_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('giang_viens', function (Blueprint $table) {
        $table->dropSoftDeletes(); // Xóa cột deleted_at nếu rollback
    });
}
};
