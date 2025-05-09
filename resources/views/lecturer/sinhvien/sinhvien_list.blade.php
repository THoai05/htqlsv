@extends('lecturer.layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách sinh viên lớp học phần: {{ $lophocphan->tenlop }}</h1>

    <!-- Form Tìm Kiếm và Lọc -->
    <form method="GET" action="{{ route('lecturer.lophocphan.sinhvien', $lophocphan->lophoc_ID) }}" class="mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control rounded-left"
                        placeholder="🔍 Tìm theo MSSV hoặc tên sinh viên"
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-right" style="margin-left: 20px;" type="submit">
                            Tìm kiếm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

</div>
@endsection