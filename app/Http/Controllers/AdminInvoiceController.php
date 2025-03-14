<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\Doctor;


class AdminInvoiceController extends Controller
{
    // Hiển thị danh sách hóa đơn với tìm kiếm
    public function index(Request $request)
    {
        $query = Invoice::query();

        // Tìm kiếm hóa đơn nếu có input search
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('patient_name', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('services_medicines', 'like', "%$search%");
        }

        // Lấy danh sách hóa đơn
        $invoices = $query->latest()->get();

        // Tính toán thống kê
        $totalInvoices = Invoice::count();
        $totalMedicalRecords = MedicalRecord::count();
        $totalDoctors = Doctor::count();
        $totalRevenue = Invoice::where('status', 'Đã thanh toán')->sum('total_amount');

        // Lấy danh sách hồ sơ bệnh án để tạo hóa đơn
        $medicalRecords = MedicalRecord::all();

        return view('role.adminmanageinvoices', compact(
            'invoices',
            'totalInvoices',
            'totalMedicalRecords',
            'totalDoctors',
            'totalRevenue',
            'medicalRecords'
        ));

    }





    // Hiển thị form tạo hóa đơn
    public function create()
    {
        return view('admin.createinvoice');
    }

    // Lưu hóa đơn mới vào CSDL
    public function store(Request $request)
    {
        $request->validate([
            'medical_record_id' => 'required|exists:medical_records,id',
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:Đã thanh toán,Chưa thanh toán',
        ]);

        // Lấy thông tin hồ sơ bệnh án
        $medicalRecord = MedicalRecord::findOrFail($request->medical_record_id);

        // Tạo hóa đơn mới
        Invoice::create([
            'medical_record_id' => $medicalRecord->id,
            'patient_name' => $medicalRecord->name,
            'exam_date' => $medicalRecord->exam_date,
            'phone' => $medicalRecord->phone,
            'services_medicines' => $medicalRecord->service . "; " . $medicalRecord->prescription,
            'invoice_date' => $request->invoice_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.invoices.index')->with('success', 'Hóa đơn đã được tạo thành công.');
    }


    // Hiển thị form chỉnh sửa hóa đơn
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('admin.editinvoice', compact('invoice'));
    }

    // Cập nhật hóa đơn
    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_date' => 'required|date',
            'services_medicines' => 'nullable|string',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Đã thanh toán,Chưa thanh toán',
        ]);

        $invoice = Invoice::findOrFail($id);

        $invoice->update([
            'invoice_date' => $request->invoice_date,
            'services_medicines' => $request->services_medicines,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.invoices.index')->with('success', 'Hóa đơn đã được cập nhật.');
    }


    // Xóa hóa đơn
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('admin.invoices.index')->with('success', 'Hóa đơn đã bị xóa.');
    }
}