@extends('student.layouts.app')

@section('content')
    <div class="container">
        <h2>Các lớp học phần của tôi</h2>
        <table class="table table-bordered">
            <a href="{{ route('student.chitietthongtin', $sinhvien->sinhvien_ID) }}"
                class="btn btn-outline-primary btn-sm rounded-pill shadow-sm m-lg-3">
                <i class="fas fa-user me-1"></i> Chi tiết thông tin
            </a>
            <thead>
                <tr>
                    <th>Tên lớp học phần</th>
                    <th>Môn học</th>
                    <th>Số tín chỉ</th>
                    <th>Phòng học</th>
                    <th>Ngày học</th>
                    <th>Tiết bắt đầu</th>
                    <th>Tiết kết thúc</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($lophocphans as $lop)
                    <tr>
                        <td>{{ $lop->tenlop }}</td>
                        <td>{{ $lop->monhoc->ten_mon_hoc ?? 'Chưa có' }}</td>
                        <td>{{ $lop->monhoc->so_tin_chi }}</td>
                        <td>{{ $lop->phonghoc->tenphonghoc ?? 'Chưa có' }}</td>
                        <td>{{ $lop->ngayhoc }}</td>
                        <td>{{ $lop->tietbatdau }}</td>
                        <td>{{ $lop->tietketthuc }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection