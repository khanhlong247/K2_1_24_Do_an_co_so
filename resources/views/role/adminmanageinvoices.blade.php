@extends('layouts.app')

@section('title', 'Quản lý Hóa Đơn - Admin')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Quản lý Hóa Đơn</h1>

    <!-- Phần Thống Kê -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-info text-white text-center">
                <div class="card-body">
                    <h5 class="card-title">Số Hóa Đơn</h5>
                    <h2>{{ $totalInvoices }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary text-white text-center">
                <div class="card-body">
                    <h5 class="card-title">Số Hồ Sơ Bệnh Án</h5>
                    <h2>{{ $totalMedicalRecords }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white text-center">
                <div class="card-body">
                    <h5 class="card-title">Số Bác Sĩ Hiện Có</h5>
                    <h2>{{ $totalDoctors }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white text-center">
                <div class="card-body">
                    <h5 class="card-title">Tổng Doanh Thu</h5>
                    <h2>{{ number_format($totalRevenue, 0) }} VNĐ</h2>
                </div>
            </div>
        </div>
    </div>


    <!-- Form tìm kiếm hóa đơn -->
    <form method="GET" action="{{ route('admin.invoices.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                placeholder="Nhập tên bệnh nhân, số điện thoại, ID hồ sơ..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>



    <!-- Form Tạo Hóa Đơn -->
    <h3 class="mb-3">Thêm Hóa Đơn</h3>
    <form method="POST" action="{{ route('admin.invoices.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="medical_record_id">ID Hồ Sơ Bệnh Án</label>
                <select name="medical_record_id" id="medical_record_id" class="form-control" required>
                    <option value="">-- Chọn Hồ Sơ Bệnh Án --</option>
                    @foreach($medicalRecords as $record)
                    <option value="{{ $record->id }}" data-name="{{ $record->name }}"
                        data-exam_date="{{ $record->exam_date }}" data-phone="{{ $record->phone }}"
                        data-service="{{ $record->service }}" data-prescription="{{ $record->prescription }}">
                        ID: {{ $record->id }} - {{ $record->name }} (Ngày khám: {{ $record->exam_date }})
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="invoice_date">Ngày Lập Hóa Đơn</label>
                <input type="date" name="invoice_date" id="invoice_date" class="form-control"
                    value="{{ now()->format('Y-m-d') }}" required>
            </div>

            <div class="col-md-6">
                <label for="total_amount">Tổng Số Tiền</label>
                <div class="input-group">
                    <input type="number" step="any" name="total_amount" id="total_amount" class="form-control" required>
                    <span class="input-group-text">VNĐ</span>
                </div>
            </div>

            <div class="col-md-6">
                <label for="status">Trạng Thái Thanh Toán</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Chưa thanh toán">Chưa thanh toán</option>
                    <option value="Đã thanh toán">Đã thanh toán</option>
                </select>
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-success w-100">Thêm Hóa Đơn</button>
            </div>
        </div>
    </form>


    <!-- Danh Sách Hóa Đơn -->
    <h3 class="mt-5">Danh Sách Hóa Đơn</h3>
    @if($invoices->isEmpty())
    <div class="alert alert-info text-center">Không có hóa đơn nào.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Ngày Lập</th>
                    <th>Tên Bệnh Nhân</th>
                    <th>ID Hồ Sơ</th>
                    <th>Ngày Khám</th>
                    <th>Số Điện Thoại</th>
                    <th>Dịch Vụ + Thuốc</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr id="invoiceRow-{{ $invoice->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>{{ $invoice->patient_name }}</td>
                    <td>{{ $invoice->medical_record_id }}</td>
                    <td>{{ $invoice->exam_date }}</td>
                    <td>{{ $invoice->phone }}</td>
                    <td>{{ $invoice->services_medicines }}</td>
                    <td>{{ number_format($invoice->total_amount, 0) }} VNĐ</td>
                    <td>
                        @if($invoice->status === 'Chưa thanh toán')
                        <span class="badge bg-warning">Chưa Thanh Toán</span>
                        @else
                        <span class="badge bg-success">Đã Thanh Toán</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $invoice->id }}">Sửa</button>
                        <form method="POST" action="{{ route('admin.invoices.destroy', $invoice->id) }}"
                            class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                <!-- Form chỉnh sửa sẽ được hiển thị khi bấm nút "Sửa" -->
                <tr id="editRow-{{ $invoice->id }}" style="display: none;">
                    <td colspan="10">
                        <form method="POST" action="{{ route('admin.invoices.update', $invoice->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="date" name="invoice_date" class="form-control"
                                        value="{{ $invoice->invoice_date }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="services_medicines" class="form-control"
                                        value="{{ $invoice->services_medicines }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="total_amount" class="form-control"
                                        value="{{ $invoice->total_amount }}" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="status" class="form-control">
                                        <option value="Chưa thanh toán"
                                            {{ $invoice->status == 'Chưa thanh toán' ? 'selected' : '' }}>Chưa thanh
                                            toán</option>
                                        <option value="Đã thanh toán"
                                            {{ $invoice->status == 'Đã thanh toán' ? 'selected' : '' }}>Đã thanh toán
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

<script>
document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        let id = this.getAttribute('data-id');
        let editRow = document.getElementById(`editRow-${id}`);

        if (editRow.style.display === 'none' || editRow.style.display === '') {
            editRow.style.display = 'table-row';
        } else {
            editRow.style.display = 'none';
        }
    });
});
</script>
@endsection