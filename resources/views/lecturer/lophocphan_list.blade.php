@extends('lecturer.layouts.app')

@section('content')
    <h1>Danh sách lớp học phần</h1>

    @if($lophocphans->isEmpty())
        <p class="alert alert-warning">Không có lớp học phần nào.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Tên lớp học phần</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lophocphans as $lophocphan)
                    <tr>
                        <td>{{ $lophocphan->tenlop }}</td>
                        <td>
                            <a href="{{ route('lecturer.lophocphan.sinhvien', $lophocphan->lophoc_ID) }}"
                                class="btn btn-primary">Xem sinh viên</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection