@extends('student.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient text-white text-center"
            style="background: linear-gradient(90deg, #6610f2, #6f42c1)">
            <h3 class="mb-0" style="color:black">✏️ Chỉnh Sửa Thông Tin Sinh Viên</h3>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('student.chinhsuathongtin', $sinhvien->sinhvien_ID) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Họ Tên</label>
                        <input type="text" name="hoten" value="{{ $sinhvien->hoten }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $sinhvien->email }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SĐT</label>
                        <input type="text" name="sdt" value="{{ $sinhvien->sdt }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Căn cước công dân</label>
                        <input type="text" name="cccd" value="{{ $sinhvien->cccd }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ngày sinh</label>
                        <input type="date" name="ngaysinh"
                            value="{{ $sinhvien->ngaysinh ? \Carbon\Carbon::parse($sinhvien->ngaysinh)->format('Y-m-d') : '' }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Giới tính</label>
                        <select name="gioitinh" class="form-select">
                            <option value="Nam" {{ $sinhvien->gioitinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ $sinhvien->gioitinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dân tộc</label>
                        <input type="text" name="dantoc" value="{{ $sinhvien->dantoc }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tôn giáo</label>
                        <input type="text" name="tongiao" value="{{ $sinhvien->tongiao }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nơi sinh</label>
                        <input type="text" name="noisinh" value="{{ $sinhvien->noisinh }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tình trạng</label>
                        <input type="text" name="tinhtrang" value="{{ $sinhvien->tinhtrang }}" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2">
                        <i class="bi bi-save me-1"></i> Cập Nhật
                    </button>
                    <a href="#" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection