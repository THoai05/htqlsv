@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Chỉnh sửa Môn Học</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.monhocs.update', $monhoc->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tên môn học</label>
                <input type="text" name="ten_mon_hoc" class="form-control"
                    value="{{ old('ten_mon_hoc', $monhoc->ten_mon_hoc) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mã môn học</label>
                <input type="text" name="ma_mon_hoc" class="form-control"
                    value="{{ old('ma_mon_hoc', $monhoc->ma_mon_hoc) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số tín chỉ</label>
                <input type="number" name="so_tin_chi" class="form-control"
                    value="{{ old('so_tin_chi', $monhoc->so_tin_chi) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input type="text" name="mo_ta" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Khoa</label>
                <input type="text" name="khoa" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.monhocs.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection