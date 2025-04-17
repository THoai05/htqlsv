@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Lớp Học Phần</h1>

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

    <form action="{{ route('admin.lichhoc.update', $lophocphan->lophoc_ID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tenlop">Tên Lớp:</label>
            <input type="text" name="tenlop" id="tenlop" class="form-control" value="{{ $lophocphan->tenlop }}"
                required>
        </div>

        <div class="form-group">
            <label for="mamonhoc">Môn Học:</label>
            <select name="mamonhoc" id="mamonhoc" class="form-control" required>
                <option value="">-- Chọn môn học --</option>
                @foreach($monhocs as $mon)
                <option value="{{ $mon->id }}" {{ $lophocphan->mamonhoc == $mon->id ? 'selected' : '' }}>
                    {{ $mon->ten_mon_hoc }} ({{ $mon->ma_mon_hoc }})
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="phonghoc_ID">Phòng Học:</label>
            <select name="phonghoc_ID" id="phonghoc_ID" class="form-control" required>
                <option value="">-- Chọn phòng học --</option>
                @foreach($phonghocs as $phong)
                <option value="{{ $phong->phonghoc_ID }}" {{ $lophocphan->phonghoc_ID == $phong->phonghoc_ID ? 'selected' : '' }}>
                    {{ $phong->tenphonghoc }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="giangvien_ID">Giảng Viên:</label>
            <select name="giangvien_ID" id="giangvien_ID" class="form-control" required>
                <option value="">-- Chọn giảng viên --</option>
                @foreach($giangviens as $gv)
                <option value="{{ $gv->id }}" {{ $lophocphan->giangvien_ID == $gv->id ? 'selected' : '' }}>
                    {{ $gv->ho_ten }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="soluongsv">Số Lượng Sinh Viên:</label>
            <input type="number" name="soluongsv" id="soluongsv" class="form-control"
                value="{{ $lophocphan->soluongsv }}" required>
        </div>

        <div class="form-group">
            <label for="thoigianbatdau">Thời Gian Bắt Đầu:</label>
            <input type="date" name="thoigianbatdau" id="thoigianbatdau" class="form-control"
                value="{{ $lophocphan->thoigianbatdau }}" required>
        </div>

        <div class="form-group">
            <label for="thoigianketthuc">Thời Gian Kết Thúc:</label>
            <input type="date" name="thoigianketthuc" id="thoigianketthuc" class="form-control"
                value="{{ $lophocphan->thoigianketthuc }}" required>
        </div>

        <div class="form-group">
            <label for="ngayhoc">Ngày Học:</label>
            <input type="text" name="ngayhoc" id="ngayhoc" class="form-control" value="{{ $lophocphan->ngayhoc }}"
                required>
        </div>

        <div class="form-group">
            <label for="tietbatdau">Tiết Bắt Đầu:</label>
            <input type="number" name="tietbatdau" id="tietbatdau" class="form-control"
                value="{{ $lophocphan->tietbatdau }}" required>
        </div>

        <div class="form-group">
            <label for="tietketthuc">Tiết Kết Thúc:</label>
            <input type="number" name="tietketthuc" id="tietketthuc" class="form-control"
                value="{{ $lophocphan->tietketthuc }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ route('admin.lichhoc.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection