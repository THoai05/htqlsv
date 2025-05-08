@extends('lecturer.layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách sinh viên lớp học phần: {{ $lophocphan->tenlop }}</h1>

    <!-- Form Tìm Kiếm và Lọc -->
    <form method="GET" action="{{ route('lecturer.lophocphan.sinhvien', $lophocphan->lophoc_ID) }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên hoặc MSSV" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>

    @if($sinhviens->isEmpty())
    <p>Không có sinh viên nào trong lớp học phần này.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>MSSV</th>
                <th>Tên Sinh viên</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sinhviens as $sinhvien)
            <tr>
                <td>{{ $sinhvien->mssv }}</td>
                <td>{{ $sinhvien->hoten }}</td>
                <td>
                    <!-- Thêm link xem điểm cho sinh viên -->
                    <a href="{{ route('lecturer.diem.show', ['lophoc_ID' => $lophocphan->lophoc_ID, 'sinhvien_ID' => $sinhvien->sinhvien_ID]) }}">
                        Xem Điểm
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($sinhviens->isEmpty())
    <p>Không có sinh viên nào trong lớp học phần này.</p>
    @else
    <a href="{{ route('lecturer.diem.baocao', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" class="btn btn-success mb-3">
        Báo cáo điểm lớp
    </a>

    <a href="{{ route('lecturer.diemdanh.index', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" class="btn btn-primary mb-3">
        Điểm danh lớp
    </a>
    @endif
</div>
@endsection