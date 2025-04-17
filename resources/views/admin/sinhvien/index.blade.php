@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Danh Sách Sinh Viên</h2>
    <a href="{{ route('admin.sinhvien.create') }}" class="btn btn-primary">Thêm Sinh Viên</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>MSSV</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinhviens as $sv)
            <tr>
                <td>{{ $sv->id }}</td>
                <td>{{ $sv->hoten }}</td>
                <td>{{ $sv->mssv }}</td>
                <td>{{ $sv->email }}</td>
                <td>{{ $sv->sdt }}</td>
                <td>
                    <a href="{{ route('admin.sinhvien.edit', ['sinhvien' => $sv->sinhvien_ID]) }}"
                        class="btn btn-warning">Sửa</a>
                    <form action="{{ route('admin.sinhvien.destroy', $sv->sinhvien_ID) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection