<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ')</title>

    <!-- Link đến các file CSS của Bootstrap hoặc các thư viện bạn muốn sử dụng -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Thêm các CSS khác nếu cần -->

    <style>
        html,
        body {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        /* Navbar tùy chỉnh */
        .navbar {
            background-color: #1a73e8;
            /* Màu xanh dương */
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .navbar-custom {
            background-color: #4a90e2;
            /* Màu xanh dương */
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #fff;
        }

        .navbar-custom .nav-link:hover {
            color: #ffc107;
            /* Màu vàng khi hover */
        }

        .content {
            padding-top: 80px;
            /* Đẩy nội dung xuống dưới thanh nav */
        }
    </style>

    @yield('styles')
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Giảng viên</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('lecturer.lophocphan.index') }}">
                                <img src="{{ asset('images/download.png') }}" alt="Quản Lý Lớp Học" style="width: 24px; height: 24px;"> Quản lý Lớp Học
                            </a>
                        </li>
                        <!-- Thêm các mục menu khác nếu cần -->
                    </ul>
                    <form action="{{ route('logout') }}" method="POST" class="d-flex">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- JavaScript và jQuery, Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    @yield('scripts') <!-- Các scripts riêng cho từng view -->
</body>

</html>