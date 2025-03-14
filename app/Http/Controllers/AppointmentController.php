<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor; // Thêm dòng này
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Hiển thị form đặt Lịch
    public function create()
    {
        $doctors = Doctor::all(); // Lấy tất cả bác sĩ từ bảng `doctors`
        $specialties = Doctor::distinct()->pluck('specialty');
        return view('appointmentcreate', compact('specialties', 'doctors'));
    }

    // Xử lý Lưu Lịch hẹn
    public function store(Request $request)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'age' => 'required|integer|min:1',
        'cccd' => 'required|string|max:20',
        'appointment_date' => 'required|date|after:today',
        'description' => 'nullable|string|max:500',
    ]);

    Appointment::create([
        'doctor_id' => $request->doctor_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'age' => $request->age,
        'cccd' => $request->cccd,
        'appointment_date' => $request->appointment_date,
        'description' => $request->description,
        'status' => 'approved',
    ]);

    return redirect()->route('appointments.create')->with('success', 'Đặt lịch thành công. Chờ duyệt!');
}



    // Hiển thị danh sách lịch hẹn của bệnh nhân
    public function index()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->get();
        return view('appointments.index', compact('appointments'));
    }
}