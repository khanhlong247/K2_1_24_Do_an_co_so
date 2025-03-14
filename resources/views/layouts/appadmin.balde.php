<!DOCTYPE html>
<html lang="en">

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
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3"
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
                        <img src="/img/vn-flag.png" alt="VN" style="height: 20px;"> <!-- Icon cờ -->
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="#">Vietnamese</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
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
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">About
                            Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Services</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Contact</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/doctors') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Doctors</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <footer
        style="background-color:rgb(34, 152, 230); color: white; font-weight: bold; text-align: center; padding: 1rem 0;">
        <p>&copy; 2025 Phenikaa Clinic. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>