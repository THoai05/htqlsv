@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Giảng Viên</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('giangviens.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="ho_ten" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mã giảng viên</label>
            <input type="text" name="ma_giang_vien" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Khoa</label>
            <input type="text" name="khoa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('giangviens.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
