@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Chỉnh sửa User</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.users.update', $user->user_ID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu mới (nếu muốn thay đổi):</label>
                <input type="password" name="password" class="form-control" placeholder="Để trống nếu không đổi">
            </div>

            <div class="mb-3">
                <label class="form-label">Role:</label>
                <select name="role" class="form-select" required>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="sinhvien" {{ $user->role === 'sinhvien' ? 'selected' : '' }}>Sinh viên</option>
                    <option value="giangvien" {{ $user->role === 'giangvien' ? 'selected' : '' }}>Giảng viên</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Cập nhật</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection