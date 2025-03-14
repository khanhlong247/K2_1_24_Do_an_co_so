@extends('layouts.app')

@section('title', 'Quản lý Hóa Đơn')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4">Quản lý Hóa Đơn</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form tạo hóa đơn -->
        <h3 class="mb-3">Tạo Hóa Đơn</h3>
        <form method="POST" action="{{ route('admindoctor.invoices.store') }}">
            @csrf
            @if(isset($medicalRecord))
                <input type="hidden" name="medical_record_id" value="{{ $medicalRecord->id }}">

                <div class="mb-3">
                    <label class="form-label">ID Hồ Sơ</label>
                    <input type="text" class="form-control" value="{{ $medicalRecord->id }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên Bệnh Nhân</label>
                    <input type="text" class="form-control" value="{{ $medicalRecord->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày Khám</label>
                    <input type="date" class="form-control" value="{{ $medicalRecord->exam_date }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số Điện Thoại</label>
                    <input type="text" class="form-control" value="{{ $medicalRecord->phone }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Chi Phí</label>
                    <input type="text" class="form-control" value="{{ number_format($medicalRecord->cost, 0) }} VNĐ" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày Làm Hồ Sơ</label>
                    <input type="date" class="form-control" value="{{ $medicalRecord->created_at->format('Y-m-d') }}" readonly>
                </div>
            @endif

            <div class="mb-3">
                <label for="invoice_date" class="form-label">Ngày Lập Hóa Đơn</label>
                <input type="date" name="invoice_date" id="invoice_date" class="form-control" required
                    value="{{ now()->format('Y-m-d') }}">
            </div>
            <div class="mb-3">
                <label for="total_amount" class="form-label">Tổng Số Tiền</label>
                <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01" required
                    value="{{ old('total_amount', $medicalRecord->cost ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="services_medicines" class="form-label">Dịch Vụ + Thuốc</label>
                <textarea name="services_medicines" id="services_medicines" class="form-control"
                    rows="3">{{ old('services_medicines', $servicesMedicines ?? '') }}</textarea>
            </div>



            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái Thanh Toán</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Chưa thanh toán">Chưa thanh toán</option>
                    <option value="Đã thanh toán">Đã thanh toán</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Tạo Hóa Đơn</button>
        </form>

        <!-- Danh sách hóa đơn -->
        <h3 class="mt-5">Danh Sách Hóa Đơn</h3>
        @if(isset($invoices) && $invoices->isEmpty())
            <div class="alert alert-info">Chưa có hóa đơn nào.</div>
        @elseif(isset($invoices))
            <div class="table-responsive">
                <table class="table table-bordered mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Ngày Lập Hóa Đơn</th>
                            <th>Tên Bệnh Nhân</th>
                            <th>Ngày Khám</th>
                            <th>Số Điện Thoại</th>
                            <th>Chi Phí</th>
                            <th>Ngày Làm Hồ Sơ</th>
                            <th>Tổng Số Tiền</th>
                            <th>Dịch Vụ + Thuốc</th>
                            <th>Trạng Thái</th>
                            <th>ID Hồ Sơ</th>
                            <th>Hành Động</th> <!-- Cột mới -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $invoice->invoice_date }}</td>
                                <td>{{ $invoice->patient_name }}</td>
                                <td>{{ $invoice->exam_date }}</td>
                                <td>{{ $invoice->phone }}</td>
                                <td>{{ number_format($invoice->cost, 0) }} VNĐ</td>
                                <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                <td>{{ number_format($invoice->total_amount, 0) }} VNĐ</td>
                                <td>{{ $invoice->services_medicines }}</td>
                                <td>{{ $invoice->status }}</td>
                                <td>{{ $invoice->medical_record_id }}</td>
                                <td>
                                    <!-- Nút Xóa -->
                                    <form action="{{ route('admindoctor.invoices.destroy', $invoice->id) }}" method="POST"
                                        onsubmit="return confirm('Bạn có chắc muốn xóa hóa đơn này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{ $invoices->links() }}
        @endif

    </div>
@endsection