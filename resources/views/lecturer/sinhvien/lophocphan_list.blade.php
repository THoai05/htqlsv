@extends('lecturer.layouts.app')

@section('content')
<div class="container">
    <h2>Lịch dạy của tôi</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên lớp học phần</th>
                <th>Môn học</th>
                <th>Phòng học</th>
                <th>Ngày học</th>
                <th>Tiết bắt đầu</th>
                <th>Tiết kết thúc</th>
                <th>Hành động</th> <!-- Cột mới -->
            </tr>
        </thead>
        <tbody>
            @foreach ($lophocphans as $lop)
            <tr>
                <td>{{ $lop->tenlop }}</td>
                <td>{{ $lop->monhoc->ten_mon_hoc ?? 'Chưa có' }}</td>
                <td>{{ $lop->phonghoc->tenphonghoc ?? 'Chưa có' }}</td>
                <td>{{ $lop->ngayhoc }}</td>
                <td>{{ $lop->tietbatdau }}</td>
                <td>{{ $lop->tietketthuc }}</td>
                <td>
                    <!-- Thêm nút để xem danh sách sinh viên -->
                    <a href="{{ route('lecturer.lophocphan.sinhvien', $lop->lophoc_ID) }}" class="btn btn-primary">Xem sinh viên</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection