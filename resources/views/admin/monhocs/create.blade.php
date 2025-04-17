@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Môn Học</h2>

    <form action="{{ route('admin.monhocs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên Môn Học</label>
            <input type="text" name="ten_mon_hoc" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mã Môn Học</label>
            <input type="text" name="ma_mon_hoc" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Số Tín Chỉ</label>
            <input type="number" name="so_tin_chi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.monhocs.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection