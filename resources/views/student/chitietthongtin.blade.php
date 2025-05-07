@extends('student.layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Chi tiết thông tin sinh viên</h2>

        <div class="card">
            <div class="card-body">
                <p><strong>Họ tên:</strong> {{ $sinhvien->hoten }}</p>
                <p><strong>MSSV:</strong> {{ $sinhvien->mssv }}</p>
                <p><strong>Email:</strong> {{ $sinhvien->email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $sinhvien->sdt }}</p>
            </div>
        </div>
    </div>
@endsection