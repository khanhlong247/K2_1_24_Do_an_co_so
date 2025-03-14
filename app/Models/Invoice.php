<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name', // Tên bệnh nhân
        'exam_date',    // Ngày khám từ hồ sơ bệnh án
        'phone',        // Số điện thoại từ hồ sơ bệnh án
        'cost',         // Chi phí từ hồ sơ bệnh án (đã nhân 1000 nếu cần)
        'invoice_date', // Ngày lập hóa đơn
        'total_amount', // Tổng số tiền của hóa đơn
        'status',       // Trạng thái thanh toán (Đã thanh toán/Chưa thanh toán)
        'medical_record_id', // Liên kết với hồ sơ bệnh án
        'services_medicines', // ⚠️ Thêm trường này vào để có thể lưu dữ liệu
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}