@extends('lecturer.layouts.app')

@section('content')
    <div class="container">
        <h1>Báo cáo điểm lớp học phần: {{ $lophoc->tenlop }}</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MSSV</th>
                    <th>Họ tên</th>
                    <th>15p 1</th>
                    <th>15p 2</th>
                    <th>15p 3</th>
                    <th>Giữa kỳ</th>
                    <th>Cuối kỳ</th>
                    <th>Trung bình</th>
                </tr>
            </thead>
            <tbody>
                @foreach($danhsach as $sv)
                    <tr>
                        <td>{{ $sv->mssv }}</td>
                        <td>{{ $sv->hoten }}</td>
                        <td>{{ $sv->diem_15p_1 }}</td>
                        <td>{{ $sv->diem_15p_2 }}</td>
                        <td>{{ $sv->diem_15p_3 }}</td>
                        <td>{{ $sv->giua_ki }}</td>
                        <td>{{ $sv->cuoi_ki }}</td>
                        <td><strong>{{ $sv->diem_tb }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection