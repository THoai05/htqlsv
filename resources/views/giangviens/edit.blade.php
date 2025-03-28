@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fas fa-edit"></i> Chỉnh sửa thông tin giảng viên</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('giangviens.update', ['giangvien' => $giangVien->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" name="ho_ten" class="form-control rounded-pill" 
                                value="{{ old('ho_ten', $giangVien->ho_ten) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Mã giảng viên</label>
                            <input type="text" name="ma_giang_vien" class="form-control rounded-pill" 
                                value="{{ old('ma_giang_vien', $giangVien->ma_giang_vien) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Khoa</label>
                            <input type="text" name="khoa" class="form-control rounded-pill" 
                                value="{{ old('khoa', $giangVien->khoa) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control rounded-pill" 
                                value="{{ old('email', $giangVien->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="so_dien_thoai" class="form-control rounded-pill" 
                                value="{{ old('so_dien_thoai', $giangVien->so_dien_thoai) }}" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Cập nhật
                            </button>
                            <a href="{{ route('giangviens.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
