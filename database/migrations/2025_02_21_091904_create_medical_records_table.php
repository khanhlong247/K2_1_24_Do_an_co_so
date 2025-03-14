<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');

            $table->string('name');              // Có thể chỉnh sửa tên từ thông tin lịch hẹn
            $table->string('email');             // Có thể chỉnh sửa email từ thông tin lịch hẹn
            $table->string('phone');
            $table->integer('age');
            $table->string('cccd');              // Số căn cước công dân
            $table->string('service')->nullable(); // Dịch vụ khám/chữa bệnh
            $table->date('exam_date');          // Ngày khám: nếu bệnh nhân đến đúng giờ, chuyển ngày hẹn khám từ lịch hẹn vào đây
            $table->decimal('cost', 8, 2)->nullable(); // Chi phí khám/chữa bệnh
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid'); // Trạng thái thanh toán
            $table->text('diagnosis');          // Chẩn đoán
            $table->text('prescription')->nullable(); // Toa thuốc
            $table->text('notes')->nullable();        // Ghi chú thêm



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
}