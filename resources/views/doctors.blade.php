@extends('layouts.app')

@section('title', 'Danh sách Bác sĩ')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4"
        style="font-family: 'Poppins', sans-serif; font-size: 36px; font-weight: 700; color: #0056b3;">
        Danh Sách Bác Sĩ
    </h2>

    <div class="row justify-content-center">
        @foreach($doctors as $doctor)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body text-center p-4">
                    <!-- Ảnh bác sĩ -->
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset($doctor->image) }}" class="rounded-circle mb-3"
                            style="width: 150px; height: 150px; object-fit: cover; border: 5px solid #007bff;"
                            alt="{{ $doctor->name }}">
                    </div>

                    <!-- Thông tin bác sĩ -->
                    <h4 class="doctor-name">{{ $doctor->name }}</h4>
                    <p class="doctor-specialty">{{ $doctor->specialty }}</p>

                    <hr class="doctor-divider">

                    <div class="text-start mx-auto px-3 py-2 rounded info-box" style="max-width: 450px;">
                        <p class="mb-2"><strong>Email:</strong> {{ $doctor->email }}</p>
                        <p class="mb-2"><strong>Số điện thoại:</strong> {{ $doctor->phone }}</p>
                        <p class="mb-0"><strong>Mô tả:</strong> {{ $doctor->bio ?: 'Chưa cập nhật' }}</p>
                    </div>

                    <a href="#" class="btn btn-primary btn-sm mt-3">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- CSS giúp hiển thị chuyên nghiệp hơn -->
<style>
.doctor-name {
    font-size: 22px;
    font-weight: 600;
    color: #0056b3;
    margin-bottom: 5px;
}

.doctor-specialty {
    font-size: 18px;
    font-weight: 500;
    color: #007bff;
    margin-bottom: 10px;
}

.doctor-divider {
    width: 50%;
    margin: 10px auto;
    border-top: 2px solid #ddd;
}

.info-box {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.btn-primary {
    background-color: #007bff;
    border: none;
    font-size: 14px;
    padding: 8px 15px;
    border-radius: 8px;
}

.btn-primary:hover {
    background-color: #0056b3;
}
</style>

@endsection