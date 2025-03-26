@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Chỉnh Sửa Sinh Viên</h2>

        <form action="{{ route('sinhvien.update', $sinhvien->sinhvien_ID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Họ Tên:</label>
                <input type="text" name="hoten" value="{{ $sinhvien->hoten }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>MSSV:</label>
                <input type="text" name="mssv" value="{{ $sinhvien->mssv }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="{{ $sinhvien->email }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>SĐT:</label>
                <input type="text" name="sdt" value="{{ $sinhvien->sdt }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Cập Nhật</button>
            <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection