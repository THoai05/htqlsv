<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->tinyInteger('co_mat')->default(0);
            $table->tinyInteger('tuan')->unsigned();
            $table->timestamps();
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
