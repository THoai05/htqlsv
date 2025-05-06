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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID phiên người dùng
            $table->unsignedBigInteger('user_ID')->nullable()->index(); // Khóa ngoại với user_ID thay vì user_id
            $table->string('ip_address', 45)->nullable(); // Địa chỉ IP của người dùng
            $table->text('user_agent')->nullable(); // Thông tin user agent
            $table->longText('payload'); // Dữ liệu của phiên (dạng serialized)
            $table->integer('last_activity')->index(); // Thời gian hoạt động cuối cùng
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
