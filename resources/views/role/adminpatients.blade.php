@extends('layouts.app')

@section('title', 'Danh sách tất cả bệnh nhân')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Danh sách Tất Cả Bệnh Nhân Đã Đăng Ký Khám</h1>

    @if($patients->isEmpty())
    <div class="alert alert-info text-center">Hiện tại không có bệnh nhân nào đăng ký khám.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên Bệnh Nhân</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Tuổi</th>
                <th>Căn Cước Công Dân</th>
                <th>Ngày Hẹn</th>
                <th>Bác Sĩ</th>
                <th>Chuyên Khoa</th>
                <th>Ghi Chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $appointment)
            <tr>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phone }}</td>
                <td>{{ $appointment->age }}</td>
                <td>{{ $appointment->cccd }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ optional($appointment->doctor)->name }}</td>
                <td>{{ optional($appointment->doctor)->specialty }}</td>
                <td>{{ $appointment->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection