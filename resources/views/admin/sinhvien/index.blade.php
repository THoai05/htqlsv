@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Danh Sách Sinh Viên</h2>
        <a href="{{ route('admin.sinhvien.create') }}" class="btn btn-primary mb-3">Thêm Sinh Viên</a>

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
                    <th>Căn Cước Công Dân</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th>Dân Tộc</th>
                    <th>Tôn Giáo</th>
                    <th>Nơi Sinh</th>
                    <th>Tình Trạng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sinhviens as $sv)
                    <tr>
                        <td>{{ $sv->sinhvien_ID }}</td>
                        <td>{{ $sv->hoten }}</td>
                        <td>{{ $sv->mssv }}</td>
                        <td>{{ $sv->email }}</td>
                        <td>{{ $sv->sdt }}</td>
                        <td>{{ $sv->cccd }}</td>
                        <td>{{ \Carbon\Carbon::parse($sv->ngaysinh)->format('d/m/Y') }}</td>
                        <td>{{ $sv->gioitinh }}</td>
                        <td>{{ $sv->dantoc }}</td>
                        <td>{{ $sv->tongiao }}</td>
                        <td>{{ $sv->noisinh }}</td>
                        <td>{{ $sv->tinhtrang }}</td>
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