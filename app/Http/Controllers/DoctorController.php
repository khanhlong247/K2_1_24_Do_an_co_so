<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Import model Doctor
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Hiển thị danh sách tất cả bác sĩ.
     */
    public function index()
    {
        $doctors = Doctor::all(); // Lấy tất cả bác sĩ từ database
        return view('doctors', compact('doctors'));
    }

    /**
     * Hiển thị danh sách bác sĩ cho admin.
     */
    public function adminIndex()
    {
        $doctors = Doctor::all();
        return view('role.adminfixdoctors', compact('doctors'));
    }

    /**
     * Thêm một bác sĩ mới.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:doctors',
            'password' => 'required|string|min:8',
            'specialty' => 'required|string',
        ]);

        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'specialty' => $request->specialty,
        ]);

        return redirect()->back()->with('success', 'Bác sĩ đã được thêm thành công!');
    }

    /**
     * Cập nhật thông tin bác sĩ.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:doctors,email,' . $id,
            'specialty' => 'required|string',
        ]);

        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'specialty' => $request->specialty,
        ]);

        return redirect()->back()->with('success', 'Bác sĩ đã được cập nhật thành công!');
    }

    /**
     * Xóa bác sĩ.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->back()->with('success', 'Bác sĩ đã được xóa thành công!');
    }





    public function getDoctorsBySpecialty($specialty)
    {
        $doctors = Doctor::where('specialty', $specialty)->get(['id', 'name']);
        return response()->json($doctors);
    }

    public function showDashboard()
    {
        // Lấy thông tin bác sĩ từ bảng doctors (có thể dùng ID từ Auth hoặc bảng users)
        $doctor = Doctor::where('email', Auth::user()->email)->first();
    
        // Kiểm tra nếu bác sĩ không tồn tại
        if (!$doctor) {
            return redirect()->route('home')->with('error', 'Không tìm thấy thông tin bác sĩ.');
        }
    
        return view('role.admindoctor', compact('doctor'));
    }
    

    /**
     * Hiển thị lịch trình khám của bác sĩ.
     */
    public function showSchedule()
    {
        // Kiểm tra nếu user có role 'admindoctor' thì vẫn lấy được lịch
        if (Auth::user()->role === 'admindoctor') {
            $appointments = Appointment::with(['patient', 'doctor'])
                ->where('doctor_id', Auth::id()) // Lấy lịch khám theo ID của bác sĩ đăng nhập
                ->orderBy('appointment_date', 'asc')
                ->get();

            return view('role.schedule', compact('appointments'));
        } else {
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập trang này.');
        }
    }

    public function showPatients()
{
    $patients = Appointment::where('doctor_id', Auth::id()) // Chỉ lấy bệnh nhân của doctor hiện tại
        ->with('patient') // Load thông tin bệnh nhân
        ->get();

    return view('role.patients', compact('patients'));
}

    

}