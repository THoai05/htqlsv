@extends('admin.layouts.app')

@section('content')
<div class="container my-4">
    <h1 class="text-center mb-4">Danh sách người dùng</h1>

    @if(session('success'))
    <div class="alert alert-success">
        <strong>Thành công!</strong> {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Thêm Người Dùng</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->user_ID }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->user_ID) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-pencil-alt"></i> Sửa
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->user_ID) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection