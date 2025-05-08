@extends('lecturer.layouts.app')

@section('content')
<div class="container">
    <h1>Báo cáo điểm lớp học phần: {{ $lophoc->tenlop }}</h1>
    <form method="GET" action="{{ route('lecturer.diem.baocao', ['lophoc_ID' => $lophoc_ID]) }}" class="mb-4">
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