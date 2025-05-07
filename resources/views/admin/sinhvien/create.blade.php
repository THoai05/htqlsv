@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Thêm Sinh Viên</h2>

        <form action="{{ route('admin.sinhvien.store') }}" method="POST">
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
            <div class="form-group">
                <label>Căn cước công dân:</label>
                <input type="text" name="cccd" class="form-control">
            </div>
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input type="date" name="ngaysinh" class="form-control">
            </div>
            <div class="form-group">
                <label>Giới tính:</label>
                <select name="gioitinh" class="form-control">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label>Dân tộc:</label>
                <input type="text" name="dantoc" class="form-control">
            </div>
            <div class="form-group">
                <label>Tôn giáo:</label>
                <input type="text" name="tongiao" class="form-control">
            </div>
            <div class="form-group">
                <label>Nơi sinh:</label>
                <input type="text" name="noisinh" class="form-control">
            </div>
            <div class="form-group">
                <label>Tình trạng:</label>
                <input type="text" name="tinhtrang" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Thêm</button>
            <a href="{{ route('admin.sinhvien.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection