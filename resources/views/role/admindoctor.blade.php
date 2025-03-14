<!DOCTYPE html>
<html lang="en">
@section('title', 'Admin Dashboard')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div class="py-3" style="background-color: #e0f7fa; border-bottom: 1px solid #ccc;">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="d-flex align-items-center">
                    <img src="/img/logo.webp" alt="Logo" style="height: 50px;">
                </a>

                <!-- Search -->
                <div class="d-flex align-items-center" style="max-width: 400px; width: 100%;">
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." style="border-radius: 25px;">
                    <button class="btn btn-primary ms-2" style="border-radius: 25px;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <!-- Actions -->
                <a href="/appointments/create" class="btn btn-primary btn-sm rounded-pill px-3"
                    style="background-color: #007bff; border-color: #007bff;">Đặt lịch khám</a>
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
                        <img src="/img/vietnam.png" alt="VN" style="height: 20px;"> <!-- Icon cờ -->
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="#">Vietnamese</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <div class="content">
        @yield('content')
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mb-4"
                        style="font-family: 'Poppins', sans-serif; font-size: 36px; color: #0056b3; font-weight: 700;">
                        Welcome!
                    </h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Thông tin bác sĩ -->
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body text-center p-5">
                            <!-- Hình ảnh bác sĩ -->
                            <div class="d-flex flex-column align-items-center">
                                <img src="{{ asset($doctor->image) }}" class="rounded-circle mb-3"
                                    style="width: 180px; height: 180px; object-fit: cover; border: 5px solid #007bff;"
                                    alt="{{ $doctor->name }}">

                                <h2 class="mb-3"
                                    style="font-family: 'Poppins', sans-serif; font-size: 28px; font-weight: 600;">
                                    {{ $doctor->name }}
                                </h2>
                            </div>
                            <!-- Thông tin bác sĩ -->
                            <div class="info-box mx-auto p-4 mt-3" style="max-width: 600px;">
                                <div class="info-row">
                                    <span class="info-label">Chuyên Khoa</span>
                                    <span class="info-value">{{ $doctor->specialty }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Email</span>
                                    <span class="info-value">{{ $doctor->email }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Số điện thoại</span>
                                    <span class="info-value">{{ $doctor->phone }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Giới thiệu</span>
                                    <span class="info-value">{{ $doctor->bio ?: 'Chưa cập nhật' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CSS giúp cân đối và chuyên nghiệp hơn -->
            <style>
            .info-box {
                background: #f8f9fa;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .info-row {
                display: flex;
                justify-content: space-between;
                padding: 12px 0;
                font-size: 18px;
                border-bottom: 1px solid #ddd;
            }

            .info-row:last-child {
                border-bottom: none;
            }

            .info-label {
                font-weight: 600;
                color: #333;
            }

            .info-value {
                text-align: right;
                color: #555;
            }
            </style>


            <!-- Chức năng quản lý -->
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card shadow-lg p-4 text-center">
                        <div class="card-body">
                            <h3 class="card-title" style="font-size: 22px; font-weight: 600;">Lịch khám bệnh</h3>
                            <a href="{{ url('/admindoctor/schedule') }}" class="btn btn-lg btn-primary mt-3">Xem
                                lịch</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-lg p-4 text-center">
                        <div class="card-body">
                            <h3 class="card-title" style="font-size: 22px; font-weight: 600;">Hồ Sơ Bệnh Nhân</h3>
                            <a href="{{ url('/admindoctor/medicalrecords') }}" class="btn btn-lg btn-primary mt-3">Xem
                                chi
                                tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- Cột 1: Thông tin bệnh viện -->
                    <div class="col-md-3 footer-col">
                        <a href="#" class="footer-logo">
                            <img src="{{ asset('img/phenikaamec.webp') }}" alt="PHENIKAA MEC">
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
                            <a href="#"><img src="{{ asset('img/qr.png') }}" alt="Facebook"></a>
                        </div>

                        <div class="social-icons">
                            <a href="#"><img src="{{ asset('img/iconfb.webp') }}" alt="Facebook"></a>
                            <a href="#"><img src="{{ asset('img/iconyoutube.webp') }}" alt="YouTube"></a>
                            <a href="#"><img src="{{ asset('img/icontiktok.webp') }}" alt="TikTok"></a>
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

        <style>
        /* Font chữ từ Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        /* Footer Styles */
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
            /* Giới hạn kích thước logo */
            display: block;
            margin-bottom: 10px;
            /* Tạo khoảng cách với nội dung */
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

        /* Mạng xã hội */
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

        /* Responsive */
        @media (max-width: 768px) {
            .footer .row {
                text-align: center;
            }

            .footer-col {
                align-items: center;
            }


        }
        </style>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>