@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Danh sách Môn Học</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.monhocs.create') }}" class="btn btn-primary mb-3">Thêm Môn Học</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Môn Học</th>
                    <th>Mã Môn Học</th>
                    <th>Số Tín Chỉ</th>
                    <th>Khoa</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monHocs as $mh)
                    <tr>
                        <td>{{ $mh->id }}</td>
                        <td>{{ $mh->ten_mon_hoc }}</td>
                        <td>{{ $mh->ma_mon_hoc }}</td>
                        <td>{{ $mh->so_tin_chi }}</td>
                        <td>{{ $mh->khoa}}</td>
                        <td>
                            <a href="{{ route('admin.monhocs.edit', $mh->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.monhocs.destroy', $mh->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection