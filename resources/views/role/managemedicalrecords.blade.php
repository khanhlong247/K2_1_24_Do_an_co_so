@extends('layouts.app')

@section('title', 'Quản lý Hồ Sơ Bệnh Án')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif;">Quản lý Hồ Sơ Bệnh Án</h1>

        <!-- Form tìm kiếm hồ sơ bệnh án -->
        <form method="GET" action="{{ route('admin.medicalrecords.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm hồ sơ bệnh án..."
                    value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Form thêm/sửa hồ sơ bệnh án -->
        @if(isset($editMedicalRecord))
            <h3 class="mb-3">Sửa Hồ Sơ Bệnh Án</h3>
            <form method="POST" action="{{ route('admin.medicalrecords.update', $editMedicalRecord->id) }}">
                @csrf
                @method('PUT')
        @else
            <h3 class="mb-3">Thêm Hồ Sơ Bệnh Án</h3>
            <form method="POST" action="{{ route('admin.medicalrecords.store') }}">
                @csrf
        @endif
                <div class="row">
                    <!-- Chọn Bác Sĩ -->
                    <div class="col-md-4 mb-2">
                        <label for="doctor_id" class="form-label">Chọn Bác Sĩ</label>
                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                            <option value="">-- Chọn Bác Sĩ --</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ (isset($editMedicalRecord) && $editMedicalRecord->doctor_id == $doctor->id) ? 'selected' : '' }}>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tên Bệnh Nhân -->
                    <div class="col-md-4 mb-2">
                        <label for="name" class="form-label">Tên Bệnh Nhân</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $editMedicalRecord->name ?? '' }}" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-4 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ $editMedicalRecord->email ?? '' }}" required>
                    </div>

                    <!-- Số Điện Thoại -->
                    <div class="col-md-4 mb-2">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="{{ $editMedicalRecord->phone ?? '' }}" required>
                    </div>

                    <!-- Tuổi -->
                    <div class="col-md-4 mb-2">
                        <label for="age" class="form-label">Tuổi</label>
                        <input type="number" name="age" id="age" class="form-control"
                            value="{{ $editMedicalRecord->age ?? '' }}" required>
                    </div>

                    <!-- CCCD -->
                    <div class="col-md-4 mb-2">
                        <label for="cccd" class="form-label">CCCD</label>
                        <input type="text" name="cccd" id="cccd" class="form-control"
                            value="{{ $editMedicalRecord->cccd ?? '' }}" required>
                    </div>

                    <!-- Dịch Vụ -->
                    <div class="col-md-4 mb-2">
                        <label for="service" class="form-label">Dịch Vụ</label>
                        <input type="text" name="service" id="service" class="form-control"
                            value="{{ $editMedicalRecord->service ?? '' }}">
                    </div>

                    <!-- Ngày Khám -->
                    <div class="col-md-4 mb-2">
                        <label for="exam_date" class="form-label">Ngày Khám</label>
                        <input type="date" name="exam_date" id="exam_date" class="form-control"
                            value="{{ $editMedicalRecord->exam_date ?? '' }}" required>
                    </div>

                    <!-- Chi Phí -->
                    <div class="col-md-4 mb-2">
                        <label for="cost" class="form-label">Chi Phí</label>
                        <div class="input-group">
                            <input type="number" step="any" name="cost" id="cost" class="form-control"
                                value="{{ isset($editMedicalRecord) ? $editMedicalRecord->cost / 1000 : old('cost') }}"
                                required>
                            <span class="input-group-text">.000 VNĐ</span>
                        </div>
                    </div>

                    <!-- Trạng Thái Thanh Toán -->
                    <div class="col-md-4 mb-2">
                        <label for="status" class="form-label">Trạng Thái Thanh Toán</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="unpaid" {{ (isset($editMedicalRecord) && $editMedicalRecord->status == 'unpaid') ? 'selected' : '' }}>
                                Chưa thanh toán
                            </option>
                            <option value="paid" {{ (isset($editMedicalRecord) && $editMedicalRecord->status == 'paid') ? 'selected' : '' }}>
                                Đã thanh toán
                            </option>
                        </select>
                    </div>

                    <!-- Chẩn Đoán -->
                    <div class="col-12 mb-2">
                        <label for="diagnosis" class="form-label">Chẩn Đoán</label>
                        <textarea name="diagnosis" id="diagnosis" class="form-control" rows="3"
                            required>{{ $editMedicalRecord->diagnosis ?? '' }}</textarea>
                    </div>

                    <!-- Toa Thuốc -->
                    <div class="col-12 mb-2">
                        <label for="prescription" class="form-label">Toa Thuốc</label>
                        <textarea name="prescription" id="prescription" class="form-control"
                            rows="3">{{ $editMedicalRecord->prescription ?? '' }}</textarea>
                    </div>

                    <!-- Ghi Chú -->
                    <div class="col-12 mb-2">
                        <label for="notes" class="form-label">Ghi Chú</label>
                        <textarea name="notes" id="notes" class="form-control"
                            rows="3">{{ $editMedicalRecord->notes ?? '' }}</textarea>
                    </div>

                    <!-- Nút Gửi -->
                    <div class="col-12 mb-2">
                        <button type="submit"
                            class="btn {{ isset($editMedicalRecord) ? 'btn-warning' : 'btn-success' }} w-100">
                            {{ isset($editMedicalRecord) ? 'Lưu Thay Đổi' : 'Thêm Hồ Sơ Bệnh Án' }}
                        </button>
                    </div>
                </div>
            </form>

            <!-- Danh sách hồ sơ bệnh án -->
            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Bác Sĩ</th>
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
                                <td>{{ $medicalRecords->firstItem() + $loop->index }}</td>
                                <td>{{ optional($record->doctor)->name ?? 'Không xác định' }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->email }}</td>
                                <td>{{ $record->phone }}</td>
                                <td>{{ $record->exam_date }}</td>
                                <td>{{ $record->service }}</td>
                                <td>{{ number_format($record->cost / 1000, 0) }}.000 VNĐ</td>
                                <td>
                                    @if($record->status === 'unpaid')
                                        <span class="badge bg-warning">Chưa thanh toán</span>
                                    @elseif($record->status === 'paid')
                                        <span class="badge bg-success">Đã thanh toán</span>
                                    @endif
                                </td>
                                <td>{{ $record->diagnosis }}</td>
                                <td>{{ $record->prescription }}</td>
                                <td>{{ $record->notes }}</td>
                                <td>
                                    <a href="{{ route('admin.medicalrecords.index', ['edit_id' => $record->id]) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <form method="POST" action="{{ route('admin.medicalrecords.destroy', $record->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa hồ sơ bệnh án này?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection