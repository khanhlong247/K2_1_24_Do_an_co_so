<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Tên bác sĩ
            $table->string('email')->unique(); // Email (unique)
            $table->string('password'); // Mật khẩu
            $table->string('specialty'); // Chuyên khoa
            $table->string('phone'); // Số điện thoại
            $table->text('bio')->nullable(); // Thông tin mô tả (nullable)
            $table->string('image')->nullable(); // Ảnh đại diện (nullable)
            $table->timestamps(); // created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}