@extends('lecturer.layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-primary">Thông Tin Điểm Của Sinh Viên môn học : {{ $lophocphan->monhoc->ten_mon_hoc }}</h2>
        <p><strong>Số tín chỉ:</strong> {{ $lophocphan->monhoc->so_tin_chi }}</p>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($diem)
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-success">Điểm chi tiết</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Điểm 15 phút 1:</strong> {{ $diem->diem_15p_1 }}</p>
                            <p><strong>Điểm 15 phút 2:</strong> {{ $diem->diem_15p_2 }}</p>
                            <p><strong>Điểm 15 phút 3:</strong> {{ $diem->diem_15p_3 }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Điểm giữa kỳ:</strong> {{ $diem->giua_ki }}</p>
                            <p><strong>Điểm cuối kỳ:</strong> {{ $diem->cuoi_ki }}</p>
                            <p class="fw-bold text-danger"><strong>Điểm trung bình:</strong> {{ $diem->diem_tb }}</p>

                            {{-- Đánh giá Đạt / Không Đạt --}}
                            @if ($diem->diem_tb >= 4)
                                <p class="fw-bold text-success"><strong>Kết quả:</strong>✅ Đạt</p>
                            @else
                                <p class="fw-bold text-danger"><strong>Kết quả:</strong> ❌ Không đạt</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>Chưa có điểm cho sinh viên này.
            </div>
        @endif
    </div>
@endsection