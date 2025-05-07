@extends('lecturer.layouts.app')

@section('content')
<div class="container">
    <h1>Điểm của Sinh Viên</h1>

    @if($diem)
    <p><strong>Điểm hiện tại:</strong> {{ $diem->diem }}</p>
    @else
    <p><strong>Chưa có điểm cho sinh viên này.</p>
    @endif

    <h3>Nhập hoặc sửa điểm</h3>
    <form action="{{ route('lecturer.diem.save', ['lophoc_ID' => $lophoc_ID, 'sinhvien_ID' => $sinhvien_ID]) }}"
        method="POST">
        @csrf
        <div class="form-group">
            <label for="diem">Điểm</label>
            <input type="number" name="diem" class="form-control" step="0.1" min="0" max="10"
                value="{{ $diem->diem ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu điểm</button>
    </form>
</div>
@endsection