<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- Thêm Bootstrap hoặc CSS tùy ý -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            /* Đảm bảo không có khoảng cách thừa xung quanh */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            /* Đảm bảo container chiếm toàn bộ chiều rộng */
            max-width: 100%;
            /* Đảm bảo chiều rộng không bị giới hạn */
        }


        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .card-header {
            background-color: #1a73e8;
            color: #ffffff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
        }

        .btn-primary {
            background-color: #1a73e8;
            border-color: #1a73e8;
        }

        .btn-primary:hover {
            background-color: #1558b1;
            border-color: #1558b1;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
        }

        .alert-danger {
            border-radius: 10px;
        }

        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card shadow-lg p-4">
            <div class="card-header">
                <h2>Đăng nhập</h2>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                Số lượng truy cập : 201/2769037
            </form>
        </div>
    </div>

    <!-- Thêm JS nếu cần -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>