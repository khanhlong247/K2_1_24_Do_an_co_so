<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\MedicalRecord;

class InvoiceController extends Controller
{
    // Hiển thị danh sách hóa đơn với chức năng tìm kiếm
    public function index(Request $request)
    {
        $query = Invoice::with('medicalRecord');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id', 'like', "%$search%")
                ->orWhere('patient_name', 'like', "%$search%")
                ->orWhere('invoice_date', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%");
        }

        $invoices = $query->latest()->paginate(10);
        return view('role.doctormanageinvoice', compact('invoices'));
    }

    // Hiển thị form tạo hóa đơn, đồng thời hiển thị danh sách hóa đơn nếu có medical_record_id
    public function create(Request $request)
    {
        $medicalRecord = null;
        $invoices = collect();
        $servicesMedicines = '';

        if ($request->has('medical_record_id')) {
            $medicalRecord = MedicalRecord::findOrFail($request->input('medical_record_id'));
            $invoices = Invoice::where('medical_record_id', $medicalRecord->id)->latest()->paginate(5); // SỬA LẠI paginate(5)

            // Lấy dữ liệu "Dịch vụ + Thuốc" từ hồ sơ bệnh án
            $servicesMedicines = trim($medicalRecord->service . '; ' . $medicalRecord->prescription, '; ');
        }

        return view('role.doctormanageinvoice', compact('medicalRecord', 'invoices', 'servicesMedicines'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Đã thanh toán,Chưa thanh toán',
            'medical_record_id' => 'required|exists:medical_records,id',
            'services_medicines' => 'nullable|string', // Nhận dữ liệu từ form
        ]);

        $medicalRecord = MedicalRecord::findOrFail($request->input('medical_record_id'));

        // Kiểm tra dữ liệu từ form, nếu trống thì lấy từ hồ sơ bệnh án
        $servicesMedicines = $request->input('services_medicines');
        if (empty($servicesMedicines)) {
            $servicesMedicines = trim(($medicalRecord->service ?? '') . '; ' . ($medicalRecord->prescription ?? ''), '; ');
        }

        // Lưu vào hóa đơn
        $invoice = Invoice::create([
            'medical_record_id' => $medicalRecord->id,
            'patient_name' => $medicalRecord->name,
            'exam_date' => $medicalRecord->exam_date,
            'phone' => $medicalRecord->phone,
            'cost' => $medicalRecord->cost,
            'invoice_date' => $request->invoice_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
            'services_medicines' => $servicesMedicines, // Lưu thông tin "Dịch vụ + Thuốc"
        ]);

        // Kiểm tra xem dữ liệu có thực sự được lưu hay không
        if (!$invoice->exists) {
            return redirect()->back()->with('error', 'Lỗi khi lưu hóa đơn.');
        }

        return redirect()->route('admindoctor.invoices.create', ['medical_record_id' => $medicalRecord->id])
        ;
    }


    // Hiển thị form chỉnh sửa hóa đơn
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('role.editinvoice', compact('invoice'));
    }

    // Cập nhật hóa đơn
    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Đã thanh toán,Chưa thanh toán',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'invoice_date' => $request->invoice_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);

        return redirect()->route('admindoctor.invoices.index')->with('success', 'Hóa đơn đã được cập nhật.');
    }

    // Xóa hóa đơn
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->back();
    }

}