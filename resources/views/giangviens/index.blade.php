@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center text-primary">Danh sách giảng viên</h2>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thành công!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="{{ route('giangviens.create') }}" class="btn btn-success mb-3">Thêm Giảng Viên</a>

    <div class="table-responsive">
        <table class="table table-hover table-bordered shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Mã giảng viên</th>
                    <th>Khoa</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($giangViens as $gv)
                <tr>
                    <td>{{ $gv->id }}</td>
                    <td>{{ $gv->ho_ten }}</td>
                    <td>{{ $gv->ma_giang_vien }}</td>
                    <td>{{ $gv->khoa }}</td>
                    <td>{{ $gv->email }}</td>
                    <td>{{ $gv->so_dien_thoai }}</td>
                    <td>
                        <a href="{{ route('giangviens.edit', ['giangvien' => $gv->id]) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>

                        <form action="{{ route('giangviens.destroy', $gv->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
