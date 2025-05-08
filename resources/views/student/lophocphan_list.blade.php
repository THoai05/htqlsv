@extends('student.layouts.app')

@section('content')
<div class="container">
    <h2>Các lớp học phần của tôi</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Tên lớp học phần</th>
                <th>Môn học</th>
                <th>Số tín chỉ</th>
                <th>Phòng học</th>
                <th>Ngày học</th>
                <th>Tiết bắt đầu</th>
                <th>Tiết kết thúc</th>
                <th>Xem điểm</th>
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
                <td>
                    <a href="{{ route('student.diem.show', ['lophoc_ID' => $lop->lophoc_ID, 'sinhvien_ID' => $sinhvien->sinhvien_ID]) }}" class="btn btn-info btn-sm" style="display: inline-flex; align-items: center;">
                        <img src="{{ asset('images/find.png') }}" style="width: 20px; height: 20px; margin-right: 5px;" />
                        Xem Điểm
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection