@extends('lecturer.sinhvien.layouts.app')

@section('content')
    <div class="container">
        <h1>Điểm của Sinh Viên</h1>

        @if($diem)
            <p><strong>Điểm hiện tại:</strong></p>
            <ul>
                <li>Điểm 15p 1: {{ $diem->diem_15p_1 }}</li>
                <li>Điểm 15p 2: {{ $diem->diem_15p_2 }}</li>
                <li>Điểm 15p 3: {{ $diem->diem_15p_3 }}</li>
                <li>Điểm giữa kỳ: {{ $diem->giua_ki }}</li>
                <li>Điểm cuối kỳ: {{ $diem->cuoi_ki }}</li>
                <li><strong>Điểm trung bình:</strong> {{ $diem->diem_tb }}</li>
            </ul>
        @else
            <p><strong>Chưa có điểm cho sinh viên này.</strong></p>
        @endif

        <h3>Nhập hoặc sửa điểm</h3>
        <form action="{{ route('lecturer.diem.save', ['lophoc_ID' => $lophoc_ID, 'sinhvien_ID' => $sinhvien_ID]) }}"
            method="POST">
            @csrf
            <div class="form-group">
                <label for="diem_15p_1">Điểm 15p 1</label>
                <input type="number" name="diem_15p_1" class="form-control" step="0.01" min="0" max="10"
                    value="{{ $diem->diem_15p_1 ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="diem_15p_2">Điểm 15p 2</label>
                <input type="number" name="diem_15p_2" class="form-control" step="0.01" min="0" max="10"
                    value="{{ $diem->diem_15p_2 ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="diem_15p_3">Điểm 15p 3</label>
                <input type="number" name="diem_15p_3" class="form-control" step="0.01" min="0" max="10"
                    value="{{ $diem->diem_15p_3 ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="giua_ki">Điểm giữa kỳ</label>
                <input type="number" name="giua_ki" class="form-control" step="0.01" min="0" max="10"
                    value="{{ $diem->giua_ki ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="cuoi_ki">Điểm cuối kỳ</label>
                <input type="number" name="cuoi_ki" class="form-control" step="0.01" min="0" max="10"
                    value="{{ $diem->cuoi_ki ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu điểm</button>
        </form>
    </div>
@endsection