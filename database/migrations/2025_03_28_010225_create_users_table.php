<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_ID'); // Khóa chính tự động tăng
            $table->string('username')->unique(); // Username duy nhất
            $table->string('password'); // Mật khẩu
            $table->enum('role', ['admin', 'sinhvien', 'giangvien']); // Vai trò
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
