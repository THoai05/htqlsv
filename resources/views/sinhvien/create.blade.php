@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Thêm Sinh Viên</h2>

        <form action="{{ route('sinhvien.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Họ Tên:</label>
                <input type="text" name="hoten" class="form-control" required>
            </div>
            <div class="form-group">
                <label>MSSV:</label>
                <input type="text" name="mssv" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>SĐT:</label>
                <input type="text" name="sdt" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
            <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection