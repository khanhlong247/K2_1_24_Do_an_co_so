<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quản lý Bác Sĩ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Custom responsive adjustments */
        header .container {
            flex-wrap: wrap;
        }

        .footer {
            background-color: #b3e5fc;
            color: #003366;
            font-family: 'Poppins', sans-serif;
            padding: 40px 10%;
        }

        .footer-col {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-logo img {
            max-width: 180px;
            width: 100%;
            margin-bottom: 10px;
        }

        .footer-title {
            font-size: 16px;
            font-weight: 600;
            color: #0056b3;
            margin-bottom: 12px;
        }

        .footer a {
            color: #003366;
            text-decoration: none;
            font-size: 14px;
            font-weight: 400;
        }

        .footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .footer p {
            font-size: 14px;
            font-weight: 400;
        }

        .footer .list-unstyled li {
            margin-bottom: 6px;
        }

        .qr-box {
            background: white;
            padding: 10px;
            text-align: center;
            font-weight: 500;
            border: 2px solid #003366;
            border-radius: 5px;
        }

        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 12px;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
            transition: transform 0.2s ease-in-out;
        }

        .social-icons img:hover {
            transform: scale(1.1);
        }

        .footer-divider {
            margin: 20px 0;
            border-top: 1px solid #0056b3;
        }

        @media (max-width: 768px) {
            .footer-col {
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="py-3" style="background-color: #e0f7fa; border-bottom: 1px solid #ccc;">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="d-flex align-items-center">
                    <img src="{{ asset('img/logo.webp') }}" alt="Logo" class="img-fluid" style="height: 50px;">
                </a>
                <!-- Search -->
                <div class="d-flex align-items-center flex-grow-1 mx-2" style="max-width: 400px; width: 100%;">
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." style="border-radius: 25px;">
                    <button class="btn btn-primary ms-2" style="border-radius: 25px;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                <!-- Actions -->
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <a href="#" class="btn btn-primary btn-sm rounded-pill px-3">Đặt lịch khám</a>
                    <a href="#" class="btn btn-info btn-sm rounded-pill px-3" style="color: white;">1900 886648</a>
                    <a href="#" class="btn btn-warning btn-sm rounded-pill px-3" style="color: white;">Hướng dẫn khách
                        hàng</a>
                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">Đăng xuất</button>
                    </form>
                    <!-- Language Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm rounded-circle dropdown-toggle" id="languageDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/iconVN.png') }}" alt="VN" class="img-fluid" style="height: 20px;">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#">Vietnamese</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg" style="background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-weight: 500; margin: 0 10px;">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-weight: 500; margin: 0 10px;">About
                            Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-weight: 500; margin: 0 10px;">Services</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-weight: 500; margin: 0 10px;">Contact</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/doctors') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-weight: 500; margin: 0 10px;">Doctors</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <h1 class="text-center mb-4">Quản lý Bác Sĩ</h1>

        <!-- Tìm kiếm bác sĩ -->
        <form method="GET" action="{{ route('admin.doctors.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm bác sĩ..."
                    value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Form thêm hoặc sửa bác sĩ -->
        @if(isset($editDoctor))
            <h3 class="mb-3">Sửa Bác Sĩ</h3>
            <form method="POST" action="{{ route('admin.doctors.update', $editDoctor->id) }}" enctype="multipart/form-data"
                class="mb-4">
                @csrf
                <div class="row g-3 row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $editDoctor->name) }}"
                            placeholder="Tên bác sĩ" required>
                    </div>
                    <div class="col">
                        <input type="email" name="email" class="form-control" value="{{ old('email', $editDoctor->email) }}"
                            placeholder="Email" required>
                    </div>
                    <div class="col">
                        <input type="text" name="specialty" class="form-control"
                            value="{{ old('specialty', $editDoctor->specialty) }}" placeholder="Chuyên môn" required>
                    </div>
                    <div class="col">
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $editDoctor->phone) }}"
                            placeholder="Số điện thoại" required>
                    </div>
                    <div class="col">
                        <input type="text" name="bio" class="form-control" value="{{ old('bio', $editDoctor->bio) }}"
                            placeholder="Tiểu sử">
                    </div>
                    <div class="col">
                        <input type="file" name="image" class="form-control">
                        @if($editDoctor->image)
                            <img src="{{ asset($editDoctor->image) }}" alt="Ảnh bác sĩ" class="img-thumbnail mt-2 img-fluid"
                                style="max-width: 100px; height: auto; object-fit: cover;">
                        @endif
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-warning w-100">Lưu Thay Đổi</button>
                    </div>
                </div>
            </form>
        @else
            <h3 class="mb-3">Thêm Bác Sĩ</h3>
            <form method="POST" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="row g-3 row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Tên bác sĩ" required>
                    </div>
                    <div class="col">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"
                            required>
                    </div>
                    <div class="col">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <div class="col">
                        <input type="text" name="specialty" class="form-control" value="{{ old('specialty') }}"
                            placeholder="Chuyên môn" required>
                    </div>
                    <div class="col">
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                            placeholder="Số điện thoại" required>
                    </div>
                    <div class="col">
                        <input type="text" name="bio" class="form-control" value="{{ old('bio') }}" placeholder="Mô tả">
                    </div>
                    <div class="col">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success w-100">Thêm Bác Sĩ</button>
                    </div>
                </div>
            </form>
        @endif

        <!-- Danh sách bác sĩ -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Chuyên môn</th>
                        <th>Số điện thoại</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->specialty }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>
                                @if($doctor->image)
                                    <img src="{{ asset($doctor->image) }}" alt="Ảnh bác sĩ" class="img-thumbnail img-fluid"
                                        style="max-width: 50px; height: auto; object-fit: cover;">
                                @else
                                    <span>Không có ảnh</span>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('admin.doctors.index', ['edit_id' => $doctor->id]) }}"
                                    class="btn btn-warning btn-sm">Sửa</a>
                                <form method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa bác sĩ này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Cột 1: Thông tin bệnh viện -->
                <div class="col-md-3 footer-col">
                    <a href="#" class="footer-logo">
                        <img src="{{ asset('img/phenikaamec.webp') }}" alt="PHENIKAA MEC" class="img-fluid">
                    </a>
                    <p><strong>Bệnh viện Đại Học Phenikaa</strong></p>
                    <p>📍 Đường Kiều Mai, P. Phương Canh, Nam Từ Liêm, Hà Nội</p>
                    <p>📜 Giấy phép hoạt động số 386/BYT</p>
                    <p>📞 Hotline: <a href="tel:1900886648">1900.88.66.48</a> - <a
                            href="tel:02422226688">02422226688</a></p>
                    <p>📧 Email: <a href="mailto:support@phenikaamec.com">support@phenikaamec.com</a></p>
                </div>
                <!-- Cột 2: Hệ thống phòng khám -->
                <div class="col-md-3 footer-col">
                    <h5 class="footer-title">HỆ THỐNG PHÒNG KHÁM</h5>
                    <p><strong>Phòng Khám Đa Khoa - Hoàng Ngân</strong></p>
                    <p>📍 Số 167 Hoàng Ngân, Hà Nội</p>
                    <p>📞 <a href="tel:02422226699">02422226699</a></p>
                    <p>⏰ Giờ làm việc: 7h30 - 17h00</p>
                    <p><strong>Phòng Khám Răng Hàm Mặt</strong></p>
                    <p>📍 Số 167 Hoàng Ngân, Hà Nội</p>
                    <p>📞 <a href="tel:0978625499">0978625499</a></p>
                    <p>⏰ Giờ làm việc: 8h00 - 18h00</p>
                </div>
                <!-- Cột 3: Liên kết nhanh -->
                <div class="col-md-3 footer-col">
                    <h5 class="footer-title">LIÊN KẾT NHANH</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Chương trình Bác sĩ hợp tác</a></li>
                        <li><a href="#">Chuyên khoa</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                        <li><a href="#">Bệnh học</a></li>
                    </ul>
                </div>
                <!-- Cột 4: Ứng dụng & Mạng xã hội -->
                <div class="col-md-3 footer-col">
                    <h5 class="footer-title">TẢI APP PHENIKAA MEC</h5>
                    <div class="qr-box">
                        <a href="#"><img src="{{ asset('img/qr.png') }}" alt="QR Code" class="img-fluid"></a>
                    </div>
                    <div class="social-icons">
                        <a href="#"><img src="{{ asset('img/iconfb.webp') }}" alt="Facebook" class="img-fluid"></a>
                        <a href="#"><img src="{{ asset('img/iconyoutube.webp') }}" alt="YouTube" class="img-fluid"></a>
                        <a href="#"><img src="{{ asset('img/icontiktok.webp') }}" alt="TikTok" class="img-fluid"></a>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} thuộc về Bệnh viện Đại học Phenikaa</p>
                <p><a href="#">Điều khoản sử dụng</a> | <a href="#">Chính sách bảo mật</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>