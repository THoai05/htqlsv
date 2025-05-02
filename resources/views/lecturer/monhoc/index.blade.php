@extends('lecturer.layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách môn học giảng dạy</h2>
    <a href="{{ route('lecturer.monhoc.create') }}" class="btn btn-primary mb-3">Thêm môn học</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tên môn</th>
                <th>Mã môn</th>
                <th>Số tín chỉ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monhocs as $monhoc)
            <tr>
                <td>{{ $monhoc->ten_mon_hoc }}</td>
                <td>{{ $monhoc->ma_mon_hoc }}</td>
                <td>{{ $monhoc->so_tin_chi }}</td>
                <td>
                    <a href="{{ route('lecturer.monhoc.edit', $monhoc->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('lecturer.monhoc.destroy', $monhoc->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xóa?')"
                            class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection