<!DOCTYPE html>
<html lang="en">
@section('title', 'Quản Lý Dịch Vụ')

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


    @section('content')
    <div class="container mt-4">
        <h2 class="text-center text-primary">Quản Lý Dịch Vụ</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addServiceModal">Thêm Dịch
            Vụ</button>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Bảng hiển thị dịch vụ -->
        <div class="table-responsive">
            <table class="table table-bordered text-center table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Tên Dịch Vụ</th>
                        <th>Hình Ảnh</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td class="fw-bold">{{ $service->name }}</td>
                        <td>
                            <img src="{{ asset($service->image) }}" width="100"
                                onerror="this.onerror=null; this.src='{{ asset('img/default.jpg') }}';"
                                class="rounded shadow">
                        </td>
                        <td>
                            <!-- Nút sửa -->
                            <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $service->id }}"
                                data-name="{{ $service->name }}" data-image="{{ $service->image }}"
                                data-bs-toggle="modal" data-bs-target="#editServiceModal">Sửa</button>

                            <!-- Nút xóa -->
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Thêm Dịch Vụ -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Thêm Dịch Vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tên Dịch Vụ</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Chọn Hình Ảnh</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Thêm Dịch Vụ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sửa Dịch Vụ -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title">Chỉnh Sửa Dịch Vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editServiceForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="service_id" id="editServiceId">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tên Dịch Vụ</label>
                            <input type="text" name="name" id="editServiceName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Hình Ảnh</label>
                            <input type="file" name="image" class="form-control">
                            <img id="editServiceImagePreview" src="" width="100" class="mt-2 shadow rounded">
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Xử lý khi nhấn nút "Sửa"
        document.querySelectorAll(".edit-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                let id = this.getAttribute("data-id");
                let name = this.getAttribute("data-name");
                let image = this.getAttribute("data-image");

                document.getElementById("editServiceId").value = id;
                document.getElementById("editServiceName").value = name;
                document.getElementById("editServiceForm").action = `/services/${id}/update`;

                let imgPreview = document.getElementById("editServiceImagePreview");
                imgPreview.src = image ? `/${image}` : "/img/default.jpg";
            });
        });
    });
    </script>

    <style>
    /* Căn chỉnh bảng dịch vụ */
    .table {
        background: #f8f9fa;
        border-radius: 12px;
    }

    /* Hiệu ứng hover nút */
    .btn:hover {
        transform: scale(1.05);
        transition: 0.2s;
    }

    /* Chỉnh sửa modal */
    .modal-header {
        border-bottom: 2px solid #ddd;
    }

    .modal-content {
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Chỉnh sửa hình ảnh */
    img {
        border-radius: 8px;
    }
    </style>

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