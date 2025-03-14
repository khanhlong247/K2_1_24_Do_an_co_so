@extends('layouts.app')

@section('title', 'Quản lý Hồ Sơ Bệnh Án - Bác Sĩ')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4">Quản lý Hồ Sơ Bệnh Án</h1>

        <!-- Form tìm kiếm hồ sơ bệnh án -->
        <form method="GET" action="{{ route('admindoctor.medicalrecords.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Kiểm tra nếu đang chỉnh sửa hoặc tạo mới -->
        <h3 class="mb-3">{{ isset($editMedicalRecord) ? 'Sửa Hồ Sơ Bệnh Án' : 'Thêm Hồ Sơ Bệnh Án' }}</h3>

        @php $isEditing = isset($editMedicalRecord) && !empty($editMedicalRecord->id);
        @endphp

        <form method="POST"
            action="{{ $isEditing ? route('admindoctor.medicalrecords.update', $editMedicalRecord->id) : route('admindoctor.medicalrecords.store') }}">

            @csrf
            @if($isEditing)
                @method('PUT')
            @endif


            <div class="row">
                <div class="col-md-4">
                    <label>Tên Bệnh Nhân</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $editMedicalRecord->name ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $editMedicalRecord->email ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label>Số Điện Thoại</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ old('phone', $editMedicalRecord->phone ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label>Tuổi</label>
                    <input type="number" name="age" class="form-control"
                        value="{{ old('age', $editMedicalRecord->age ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label>CCCD</label>
                    <input type="text" name="cccd" class="form-control"
                        value="{{ old('cccd', $editMedicalRecord->cccd ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label>Dịch Vụ</label>
                    <input type="text" name="service" class="form-control"
                        value="{{ old('service', $editMedicalRecord->service ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label>Ngày Khám</label>
                    <input type="date" name="exam_date" class="form-control"
                        value="{{ old('exam_date', $editMedicalRecord->exam_date ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label>Chi Phí</label>
                    <div class="input-group">
                        <input type="number" step="any" name="cost" class="form-control"
                            value="{{ isset($editMedicalRecord) ? $editMedicalRecord->cost / 1000 : old('cost') }}"
                            required>
                        <span class="input-group-text">.000 VNĐ</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Trạng Thái Thanh Toán</label>
                    <select name="status" class="form-control" required>
                        <option value="unpaid" {{ (isset($editMedicalRecord) && $editMedicalRecord->status == 'unpaid') ? 'selected' : '' }}>
                            Chưa thanh toán</option>
                        <option value="paid" {{ (isset($editMedicalRecord) && $editMedicalRecord->status == 'paid') ? 'selected' : '' }}>
                            Đã
                            thanh toán</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Chẩn Đoán</label>
                    <textarea name="diagnosis" class="form-control" rows="3"
                        required>{{ old('diagnosis', $editMedicalRecord->diagnosis ?? '') }}</textarea>
                </div>
                <div class="col-md-12">
                    <label>Toa Thuốc</label>
                    <textarea name="prescription" class="form-control"
                        rows="3">{{ old('prescription', $editMedicalRecord->prescription ?? '') }}</textarea>
                </div>
                <div class="col-md-12">
                    <label>Ghi Chú</label>
                    <textarea name="notes" class="form-control"
                        rows="3">{{ old('notes', $editMedicalRecord->notes ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn {{ isset($editMedicalRecord) ? 'btn-warning' : 'btn-success' }} w-100">
                        {{ isset($editMedicalRecord) ? 'Lưu Thay Đổi' : 'Thêm Hồ Sơ Bệnh Án' }}
                    </button>
                </div>
            </div>
        </form>

        <!-- Danh sách hồ sơ bệnh án -->
        @if($medicalRecords->isEmpty())
            <div class="alert alert-info text-center">Không có hồ sơ bệnh án nào.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Bệnh Nhân</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Ngày Khám</th>
                            <th>Dịch Vụ</th>
                            <th>Chi Phí</th>
                            <th>Trạng Thái</th>
                            <th>Chẩn Đoán</th>
                            <th>Toa Thuốc</th>
                            <th>Ghi Chú</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicalRecords as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->email }}</td>
                                <td>{{ $record->phone }}</td>
                                <td>{{ $record->exam_date }}</td>
                                <td>{{ $record->service }}</td>
                                <td>{{ number_format($record->cost / 1000, 0) }}.000 VNĐ</td>
                                <td>{{ $record->status === 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}</td>
                                <td>{{ $record->diagnosis }}</td>
                                <td>{{ $record->prescription }}</td>
                                <td>{{ $record->notes }}</td>
                                <td>
                                    <a href="{{ route('admindoctor.invoices.create', ['medical_record_id' => $record->id]) }}"
                                        class="btn btn-success btn-sm">
                                        -> Tạo Hóa Đơn
                                    </a>
                                    <a href="{{ route('admindoctor.medicalrecords.index', ['edit_id' => $record->id]) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <form method="POST" action="{{ route('admindoctor.medicalrecords.destroy', $record->id) }}"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection