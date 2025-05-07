@extends('lecturer.layouts.app')

@section('content')
    <div class="container">
        <h1>Điểm danh lớp học phần: {{ $lophocphan->ten_lophoc }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('lecturer.diemdanh.store', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Điểm danh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sinhviens as $sinhvien)
                        <tr>
                            <td>{{ $sinhvien->mssv }}</td>
                            <td>{{ $sinhvien->hoten }}</td>
                            <td>{{ $lophocphan->thoigianbatdau }}</td>
                            <td>{{ $lophocphan->thoigianketthuc }}</td>
                            <td>
                                <!-- Kiểm tra nếu sinh viên đã được điểm danh -->
                                <input type="checkbox" name="co_mat[{{ $sinhvien->sinhvien_ID }}]" value="1"
                                    @if($diemdanh->where('sinhvien_ID', $sinhvien->sinhvien_ID)->first() && $diemdanh->where('sinhvien_ID', $sinhvien->sinhvien_ID)->first()->co_mat) checked @endif>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Lưu điểm danh</button>
        </form>
    </div>
@endsection