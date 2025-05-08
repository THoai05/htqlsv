<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ')</title>

    <!-- Link đến các file CSS của Bootstrap hoặc các thư viện bạn muốn sử dụng -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Thêm các CSS khác nếu cần -->
    <style>
        /* Đảm bảo body và html chiếm toàn bộ chiều rộng màn hình */
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


        /* Tùy chỉnh màu chữ các liên kết trong navbar */
        .navbar-nav .nav-link {
            color: white !important;
        }

        /* Thêm hiệu ứng hover cho các mục trong navbar */
        .navbar-nav .nav-link:hover {
            color: #f39c12 !important;
            /* Màu vàng khi hover */
        }

        /* Tùy chỉnh biểu tượng cho navbar */
        .navbar-nav .nav-link img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            margin-left: 10px;
        }

        /* Tùy chỉnh màu nút đăng xuất */
        .navbar-btn {
            background-color: #e74c3c;
            /* Màu đỏ */
            color: white;
        }

        .navbar-btn:hover {
            background-color: #c0392b;
            /* Màu đỏ đậm khi hover */
        }
    </style>

    @yield('styles')
</head>

<body>
    <!-- Navbar nằm trên cùng -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <img src="{{ asset('images/avatar-trang-4.jpg') }}" style="width: 50px; height: 50px; margin-left: 10px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.lophocphan.index') }}">
                            <img src="{{ asset('images/pencil.png') }}" alt="Xem Học Phần">
                            Xem Học Phần
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.chitietthongtin', $sinhvien->sinhvien_ID) }}">
                            <img src="{{ asset('images/029.png') }}" alt="Xem Thông Tin Cá Nhân">
                            Xem Thông Tin Cá Nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.lichhoc.index') }}">
                            <img src="{{ asset('images/calendar.png') }}" alt="Xem Học Phần">
                            Xem Lịch Học</a>
                    </li>
                </ul>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-outline-danger navbar-btn">Đăng xuất</button>
            </form>
        </div>
    </nav>

    <!-- Nội dung có khoảng cách với navbar -->
    <div class="content" style="padding-top: 80px;">
        @yield('content')
    </div>


    <!-- JavaScript và jQuery, Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    @yield('scripts') <!-- Các scripts riêng cho từng view -->
</body>

</html>