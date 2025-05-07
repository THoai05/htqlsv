<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('diem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sinhvien_ID');
            $table->unsignedBigInteger('lophoc_ID');

            $table->decimal('diem_15p_1', 5, 2)->nullable();
            $table->decimal('diem_15p_2', 5, 2)->nullable();
            $table->decimal('diem_15p_3', 5, 2)->nullable();
            $table->decimal('giua_ki', 5, 2)->nullable();
            $table->decimal('cuoi_ki', 5, 2)->nullable();
            $table->decimal('diem_tb', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diem');
    }

};
