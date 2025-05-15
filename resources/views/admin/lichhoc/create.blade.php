@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm Lớp Học Phần</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hiển thị lỗi nếu có -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.lichhoc.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tenlop">Tên Lớp:</label>
                <input type="text" name="tenlop" id="tenlop" class="form-control" placeholder="Nhập tên lớp" required>
            </div>

            <div class="form-group">
                <label for="mamonhoc">Môn Học:</label>
                <select name="mamonhoc" id="mamonhoc" class="form-control" required>
                    <option value="">-- Chọn môn học --</option>
                    @foreach($monhocs as $mon)
                        <option value="{{ $mon->id }}">{{ $mon->ten_mon_hoc }} ({{ $mon->ma_mon_hoc }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="phonghoc_ID">Phòng Học:</label>
                <select name="phonghoc_ID" id="phonghoc_ID" class="form-control" required>
                    <option value="">-- Chọn phòng học --</option>
                    @foreach($phonghocs as $phong)
                        <option value="{{ $phong->phonghoc_ID }}">{{ $phong->tenphonghoc }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="giangvien_ID">Giảng Viên:</label>
                <select name="giangvien_ID" id="giangvien_ID" class="form-control" required>
                    <option value="">-- Chọn giảng viên --</option>
                    @foreach($giangviens as $gv)
                        <option value="{{ $gv->id }}">{{ $gv->ho_ten }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="soluongsv">Số Lượng Sinh Viên:</label>
                <input type="number" name="soluongsv" id="soluongsv" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="thoigianbatdau">Thời Gian Bắt Đầu:</label>
                <input type="date" name="thoigianbatdau" id="thoigianbatdau" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="thoigianketthuc">Thời Gian Kết Thúc:</label>
                <input type="date" name="thoigianketthuc" id="thoigianketthuc" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ngayhoc">Ngày Học:</label>
                <input type="text" name="ngayhoc" id="ngayhoc" class="form-control" placeholder="Ví dụ: Thứ 2, Thứ 4"
                    required>
            </div>

            <div class="form-group">
                <label for="tietbatdau">Tiết Bắt Đầu:</label>
                <input type="number" name="tietbatdau" id="tietbatdau" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tietketthuc">Tiết Kết Thúc:</label>
                <input type="number" name="tietketthuc" id="tietketthuc" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.lichhoc.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection