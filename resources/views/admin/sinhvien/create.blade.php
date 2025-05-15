@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Sinh Viên</h2>

    {{-- Thông báo sẽ tạo tài khoản --}}
    <div class="alert alert-info">
        Khi thêm sinh viên, hệ thống sẽ tự động tạo tài khoản với tên đăng nhập theo dạng <strong>sinhvienN</strong> và mật khẩu mặc định là <strong>123456</strong>.
    </div>

    {{-- Thông báo thành công nếu có --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.sinhvien.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Họ Tên:</label>
            <input type="text" name="hoten" class="form-control" required>
            @error('hoten')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>MSSV:</label>
            <input type="text" name="mssv" class="form-control" required>
            @error('mssv')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Khoa:</label>
            <input type="text" name="khoa" class="form-control" required>
            @error('khoa')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>SĐT:</label>
            <input type="text" name="sdt" class="form-control" required>
            @error('sdt')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Căn cước công dân:</label>
            <input type="text" name="cccd" class="form-control">
            @error('cccd')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Ngày sinh:</label>
            <input type="date" name="ngaysinh" class="form-control">
            @error('ngaysinh')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Giới tính:</label>
            <select name="gioitinh" class="form-control">
                <option value="">-- Chọn --</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
            @error('gioitinh')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Dân tộc:</label>
            <input type="text" name="dantoc" class="form-control">
            @error('dantoc')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Tôn giáo:</label>
            <input type="text" name="tongiao" class="form-control">
            @error('tongiao')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Nơi sinh:</label>
            <input type="text" name="noisinh" class="form-control">
            @error('noisinh')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Tình trạng:</label>
            <input type="text" name="tinhtrang" class="form-control">
            @error('tinhtrang')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('admin.sinhvien.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection