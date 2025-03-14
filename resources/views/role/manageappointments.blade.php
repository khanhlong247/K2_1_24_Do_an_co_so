@extends('layouts.app')

@section('title', 'Quản lý Lịch Hẹn')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif;">Quản lý Lịch Hẹn</h1>

    <!-- Form tìm kiếm lịch hẹn -->
    <form method="GET" action="{{ route('admin.appointments.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm lịch hẹn..."
                value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <!-- Form thêm/sửa lịch hẹn -->
    @if($editAppointment)
    <h3 class="mb-3">Sửa Lịch Hẹn</h3>
    <form method="POST" action="{{ route('admin.appointments.update', $editAppointment->id) }}">
        @csrf
        <input type="hidden" name="_method" value="POST">

        @else
        <h3 class="mb-3">Thêm Lịch Hẹn</h3>
        <form method="POST" action="{{ route('admin.appointments.store') }}">
            @csrf
            @endif

            <div class="row">
                <!-- Dịch vụ -->
                <div class="col-md-4 mb-2">
                    <label for="specialty" class="form-label">Dịch Vụ</label>
                    <select name="specialty" id="specialty" class="form-control" required>
                        <option value="">-- Chọn Dịch Vụ --</option>
                        @foreach($specialties as $specialty)
                        <option value="{{ $specialty }}"
                            {{ isset($editAppointment) && $editAppointment->specialty == $specialty ? 'selected' : '' }}>
                            {{ $specialty }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-2">
                    <label for="doctor_id" class="form-label">Chọn Bác Sĩ</label>
                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                        <option value="">-- Chọn mục Dịch Vụ trước --</option>
                    </select>
                </div>

                <!-- Script AJAX -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#specialty').change(function() {
                        var specialty = $(this).val();
                        $('#doctor_id').html(
                            '<option value="">-- Đang tải danh sách bác sĩ... --</option>');

                        if (specialty) {
                            $.ajax({
                                url: '/get-doctors-by-specialty',
                                type: 'GET',
                                data: {
                                    specialty: specialty
                                },
                                success: function(data) {
                                    $('#doctor_id').html(
                                        '<option value="">-- Chọn Bác Sĩ --</option>');
                                    $.each(data, function(index, doctor) {
                                        $('#doctor_id').append('<option value="' +
                                            doctor.id + '">' + doctor.name +
                                            '</option>');
                                    });
                                },
                                error: function() {
                                    $('#doctor_id').html(
                                        '<option value="">-- Không có bác sĩ nào --</option>'
                                    );
                                }
                            });
                        } else {
                            $('#doctor_id').html(
                                '<option value="">-- Chọn mục Dịch Vụ trước --</option>');
                        }
                    });
                });
                </script>

                <!-- Ngày hẹn -->
                <div class="col-md-4 mb-2">
                    <label for="appointment_date" class="form-label">Ngày hẹn</label>
                    <input type="date" name="appointment_date" id="appointment_date" class="form-control"
                        value="{{ $editAppointment->appointment_date ?? '' }}" required>
                </div>

                <!-- Tên bệnh nhân -->
                <div class="col-md-4 mb-2">
                    <label for="name" class="form-label">Tên bệnh nhân</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ $editAppointment->name ?? '' }}" required>
                </div>

                <!-- Email -->
                <div class="col-md-4 mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ $editAppointment->email ?? '' }}" required>
                </div>

                <!-- Số điện thoại -->
                <div class="col-md-4 mb-2">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                        value="{{ $editAppointment->phone ?? '' }}" required>
                </div>

                <!-- Tuổi -->
                <div class="col-md-4 mb-2">
                    <label for="age" class="form-label">Tuổi</label>
                    <input type="number" name="age" id="age" class="form-control"
                        value="{{ $editAppointment->age ?? '' }}" required>
                </div>

                <!-- CCCD -->
                <div class="col-md-4 mb-2">
                    <label for="cccd" class="form-label">CCCD</label>
                    <input type="text" name="cccd" id="cccd" class="form-control"
                        value="{{ $editAppointment->cccd ?? '' }}" required>
                </div>

                <!-- Mô tả -->
                <div class="col-md-4 mb-2">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description"
                        class="form-control">{{ $editAppointment->description ?? '' }}</textarea>
                </div>

                <!-- Nút Gửi -->
                <div class="col-md-4 mb-2">
                    <button type="submit"
                        class="btn {{ isset($editAppointment) ? 'btn-warning' : 'btn-success' }} w-100">
                        {{ isset($editAppointment) ? 'Lưu Thay Đổi' : 'Thêm Lịch Hẹn' }}
                    </button>
                </div>
            </div>
        </form>

        <!-- Danh sách lịch hẹn -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>#</th>

                    <th>Bác Sĩ</th>
                    <th>Bệnh Nhân</th>
                    <th>Email</th>
                    <th>Mô Tả</th>
                    <th>Điện Thoại</th>
                    <th>Ngày Hẹn</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ optional($appointment->doctor)->name ?? 'Không xác định' }}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->description }}</td>
                    <td>{{ $appointment->phone }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>
                        @if($appointment->status === 'pending')
                        <span class="badge bg-warning">Chờ duyệt</span>
                        @elseif($appointment->status === 'approved')
                        <span class="badge bg-success">Đã duyệt</span>
                        @else
                        <span class="badge bg-danger">Đã từ chối</span>
                        @endif
                    </td>
                    <td>
                        <!-- Nút Duyệt -->
                        <form method="POST" action="{{ route('admin.appointments.approve', $appointment->id) }}"
                            class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                        </form>

                        <!-- Nút Từ chối -->
                        <form method="POST" action="{{ route('admin.appointments.reject', $appointment->id) }}"
                            class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-dark btn-sm">Từ chối</button>
                        </form>

                        <!-- Nút Sửa -->
                        <a href="{{ route('admin.appointments.index', ['edit_id' => $appointment->id]) }}"
                            class="btn btn-warning btn-sm">Sửa</a>

                        <!-- Nút Xóa -->
                        <form method="POST" action="{{ route('admin.appointments.destroy', $appointment->id) }}"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa lịch hẹn này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection