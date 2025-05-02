@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Môn Học Mới</h2>
    <form action="{{ route('monhoc.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="ten_mon_hoc">Tên môn học:</label>
            <input type="text" name="ten_mon_hoc" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="ma_mon_hoc">Mã môn học:</label>
            <input type="text" name="ma_mon_hoc" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="so_tin_chi">Số tín chỉ:</label>
            <input type="number" name="so_tin_chi" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="mo_ta">Mô tả:</label>
            <textarea name="mo_ta" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('lecturer.monhoc.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection