@extends('lecturer.layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách sinh viên lớp học phần: {{ $lophocphan->tenlop }}</h1>

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
                    <a
                        href="{{ route('lecturer.diem.show', ['lophoc_ID' => $lophocphan->lophoc_ID, 'sinhvien_ID' => $sinhvien->sinhvien_ID]) }}">
                        Xem Điểm
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@if($sinhviens->isEmpty())
<p>Không có sinh viên nào trong lớp học phần này.</p>
@else
<a href="{{ route('lecturer.diem.baocao', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" class="btn btn-success mb-3">
    Báo cáo điểm lớp
</a>
@endif
</div>
@endsection