@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cập Nhật Môn Học</h2>
    <form action="{{ route('lecturer.monhoc.update', $monhoc->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="ten_mon_hoc">Tên môn học:</label>
            <input type="text" name="ten_mon_hoc" class="form-control" value="{{ $monhoc->ten_mon_hoc }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="ma_mon_hoc">Mã môn học:</label>
            <input type="text" name="ma_mon_hoc" class="form-control" value="{{ $monhoc->ma_mon_hoc }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="so_tin_chi">Số tín chỉ:</label>
            <input type="number" name="so_tin_chi" class="form-control" value="{{ $monhoc->so_tin_chi }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="mo_ta">Mô tả:</label>
            <textarea name="mo_ta" class="form-control" rows="4">{{ $monhoc->mo_ta }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('lecturer.monhoc.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection