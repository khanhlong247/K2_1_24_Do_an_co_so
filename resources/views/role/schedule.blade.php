@extends('layouts.app')

@section('title', 'Lịch trình khám bệnh')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif;">Lịch trình Khám Bệnh</h1>

        @if($appointments->isEmpty())
            <div class="alert alert-info text-center">Hiện tại không có lịch trình khám bệnh nào.</div>
        @else
            @php
                $groupedAppointments = $appointments->groupBy(function ($appointment) {
                    return \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y');
                });
            @endphp

            @foreach($groupedAppointments as $date => $dailyAppointments)
                <div class="card mb-4 shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $date }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Bệnh Nhân</th>
                                    <th>Ghi Chú</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dailyAppointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->name }}</td>
                                        <td>{{ $appointment->description }}</td>
                                        <td>
                                            @if($appointment->status === 'approved')
                                                <span class="badge bg-success">Đã duyệt</span>
                                            @else
                                                <span class="badge bg-warning">Đang chờ</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Nút chuyển sang trang tạo hồ sơ bệnh án -->
                                            @if($appointment->status === 'approved')
                                                <a href="{{ route('admindoctor.medicalrecords.create', ['appointment_id' => $appointment->id]) }}"
                                                    class="btn btn-success btn-sm">
                                                    Tạo Hồ Sơ Bệnh Án
                                                </a>
                                            @else
                                                <button class="btn btn-secondary btn-sm" disabled>Chờ duyệt</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- CSS giúp bố cục gọn gàng hơn -->
    <style>
        .card-header {
            font-size: 20px;
            font-weight: 600;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>

@endsection