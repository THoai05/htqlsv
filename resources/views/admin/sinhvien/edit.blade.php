@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Chỉnh Sửa Sinh Viên</h2>

    <form action="{{ route('admin.sinhvien.update', $sinhvien->sinhvien_ID) }}" method="POST">
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
            <label>Khoa:</label>
            <input type="text" name="khoa" value="{{ $sinhvien->khoa }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $sinhvien->email }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>SĐT:</label>
            <input type="text" name="sdt" value="{{ $sinhvien->sdt }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Căn cước công dân:</label>
            <input type="text" name="cccd" value="{{ $sinhvien->cccd }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Ngày sinh:</label>
            <input type="date" name="ngaysinh"
                value="{{ $sinhvien->ngaysinh ? \Carbon\Carbon::parse($sinhvien->ngaysinh)->format('Y-m-d') : '' }}"
                class="form-control">
        </div>
        <div class="form-group">
            <label>Giới tính:</label>
            <select name="gioitinh" class="form-control">
                <option value="Nam" {{ $sinhvien->gioitinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ $sinhvien->gioitinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label>Dân tộc:</label>
            <input type="text" name="dantoc" value="{{ $sinhvien->dantoc }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Tôn giáo:</label>
            <input type="text" name="tongiao" value="{{ $sinhvien->tongiao }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Nơi sinh:</label>
            <input type="text" name="noisinh" value="{{ $sinhvien->noisinh }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Tình trạng:</label>
            <input type="text" name="tinhtrang" value="{{ $sinhvien->tinhtrang }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Cập Nhật</button>
        <a href="{{ route('admin.sinhvien.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection