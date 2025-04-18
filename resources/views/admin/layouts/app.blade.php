<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quản Lý Sinh Viên')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.sinhvien.index') }}">Quản Lý Sinh Viên</a>
            <a class="navbar-brand" href="{{ route('admin.giangviens.index') }}">Quản Lý Giảng Viên</a>
            <a class="navbar-brand" href="{{ route('admin.monhocs.index') }}">Quản Lý Môn Học</a>
            <a class="navbar-brand" href="{{ route('admin.lichhoc.index') }}">Quản Lý Lịch Học</a>
            <a class="navbar-brand" href="{{ route('admin.users.index') }}">Quản Lý Tài Khoản</a>

            <!-- Thêm nút logout -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-outline-danger navbar-btn">Đăng xuất</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>