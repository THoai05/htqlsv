<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGiangvienIdToMonHocs extends Migration
{
    public function up(): void
    {
        Schema::table('mon_hocs', function (Blueprint $table) {
            // Nếu cột đã có thì chỉ thêm khóa ngoại
            $table->foreign('giangvien_id')->references('id')->on('giang_viens')->onDelete('set null');
        });
    }


    public function down()
    {
        Schema::table('mon_hocs', function (Blueprint $table) {
            $table->dropForeign(['giangvien_id']);
            $table->dropColumn('giangvien_id');
        });
    }
}
