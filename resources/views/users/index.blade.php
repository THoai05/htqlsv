<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            display: inline-block;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-create {
            background-color: #007bff;
            padding: 10px 15px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Danh sách người dùng</h1>

    <a href="{{ route('users.create') }}" class="btn btn-create">Thêm Người Dùng</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Hành động</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->user_ID }}</td>
                <td>{{ $user->username }}</td>  <!-- Đổi 'ho_ten' thành 'name' -->
                <td>{{ $user->password }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->user_ID) }}" class="btn btn-edit">Sửa</a>
                    <form action="{{ route('users.destroy', $user->user_ID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>

