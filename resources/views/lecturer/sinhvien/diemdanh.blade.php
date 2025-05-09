@extends('lecturer.layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary">📋 Điểm danh: <strong>{{ $lophocphan->ten_lophoc }}</strong></h2>

    {{-- Thông báo --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form chọn tuần --}}
    <form method="GET" action="{{ route('lecturer.diemdanh.index', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" class="form-inline mb-4">
        <label for="tuan" class="mr-2 font-weight-bold">Chọn tuần:</label>
        <select name="tuan" class="form-control mr-3" onchange="this.form.submit()">
            @for ($i = 1; $i <= 15; $i++)
                <option value="{{ $i }}" {{ request('tuan', 1) == $i ? 'selected' : '' }}>Tuần {{ $i }}</option>
                @endfor
        </select>
        <span class="text-muted">🗓️ Chỉ điểm danh 1 tuần mỗi lần.</span>
    </form>

    {{-- Form điểm danh --}}
    <form action="{{ route('lecturer.diemdanh.store', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" method="POST">
        @csrf
        <input type="hidden" name="tuan" value="{{ request('tuan', 1) }}">

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center shadow-sm">
                <thead class="thead-light">
                    <tr>
                        <th class="align-middle">📌 MSSV</th>
                        <th class="align-middle">👤 Họ tên</th>
                        <th class="align-middle">✅ Có mặt (Tuần {{ request('tuan', 1) }})</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sinhviens as $sinhvien)
                    @php
                    $week = request('tuan', 1);
                    $diemdanh_sv = $diemdanh->where('sinhvien_ID', $sinhvien->sinhvien_ID)->where('tuan', $week)->first();
                    $isPresent = $diemdanh_sv && $diemdanh_sv->co_mat;
                    @endphp
                    <tr>
                        <td class="align-middle">{{ $sinhvien->mssv }}</td>
                        <td class="align-middle">{{ $sinhvien->hoten }}</td>
                        <td class="align-middle">
                            <input type="checkbox"
                                name="co_mat[{{ $sinhvien->sinhvien_ID }}]"
                                class="form-check-input"
                                style="transform: scale(1.3);"
                                value="1"
                                @if($isPresent) checked @endif>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-success px-4 py-2 shadow">💾 Lưu điểm danh</button>
        </div>
    </form>
</div>
@endsection