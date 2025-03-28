<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('mon_hocs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_mon_hoc');
            $table->string('ma_mon_hoc')->unique();
            $table->integer('so_tin_chi');
            $table->unsignedBigInteger('giang_vien_id')->nullable();
            $table->text('mo_ta')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Thêm cột deleted_at

            $table->foreign('giang_vien_id')->references('id')->on('giang_viens')->onDelete('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('mon_hocs');
    }
};

