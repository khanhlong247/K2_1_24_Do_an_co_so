<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');       // Tên bệnh nhân
            $table->date('exam_date');            // Ngày khám từ hồ sơ bệnh án
            $table->string('phone');              // Số điện thoại từ hồ sơ
            $table->bigInteger('cost')->nullable(); // Chi phí từ hồ sơ (đã nhân với 1000 nếu cần)
            $table->date('invoice_date');         // Ngày lập hóa đơn
            $table->decimal('total_amount', 10, 2);   // Tổng số tiền hóa đơn
            $table->enum('status', ['Đã thanh toán', 'Chưa thanh toán'])->default('Chưa thanh toán');
            $table->foreignId('medical_record_id')->constrained('medical_records')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}