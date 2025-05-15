@extends('student.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Chi tiết thông tin sinh viên</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-lg rounded-lg border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Họ tên:</strong> {{ $sinhvien->hoten }}</p>
                        <p><strong>MSSV:</strong> {{ $sinhvien->mssv }}</p>
                        <p><strong>Email:</strong> {{ $sinhvien->email }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $sinhvien->sdt }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Căn cước công dân:</strong> {{ $sinhvien->cccd }}</p>
                        <p><strong>Ngày sinh:</strong> {{ \Carbon\Carbon::parse($sinhvien->ngaysinh)->format('d/m/Y') }}</p>
                        <p><strong>Giới tính:</strong> {{ $sinhvien->gioitinh }}</p>
                        <p><strong>Dân tộc:</strong> {{ $sinhvien->dantoc }}</p>
                        <a href="{{ route('student.edit.thongtin', $sinhvien->sinhvien_ID) }}"
                            class="btn btn-primary rounded-pill px-4 py-2 shadow-sm fw-semibold"
                            style="background: linear-gradient(90deg, #6610f2, #6f42c1); border: none;">
                            <i class="bi bi-pencil-square me-2"></i> Sửa thông tin chi tiết
                        </a>
                    </div>
                </div>

                <div class="mt-3">
                    <p><strong>Tôn giáo:</strong> {{ $sinhvien->tongiao }}</p>
                    <p><strong>Nơi sinh:</strong> {{ $sinhvien->noisinh }}</p>
                    <p><strong>Tình trạng:</strong> {{ $sinhvien->tinhtrang }}</p>
                </div>

            </div>
        </div>
    </div>
@endsection