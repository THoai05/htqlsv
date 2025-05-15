@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Quản Lý Lịch Học</h1>
        <!-- Nút chuyển đến trang tạo lớp học phần mới -->
        <a href="{{ route('admin.lichhoc.create') }}" class="btn btn-success mb-3">Thêm Lớp Học Phần</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @foreach($monhocs as $monhoc)
            <div class="card mb-4">
                <div class="card-header">
                    <h3>{{ $monhoc->ten_mon_hoc }} ({{ $monhoc->ma_mon_hoc }})</h3>
                    <p>Số tín chỉ: {{ $monhoc->so_tin_chi }}</p>
                </div>
                <div class="card-body">
                    @if($monhoc->lophocphans->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên Lớp</th>
                                    <th>Phòng Học</th>
                                    <th>Giảng Viên</th>
                                    <th>Số SV</th>
                                    <th>Thời Gian</th>
                                    <th>Ngày Học</th>
                                    <th>Tiết (Bắt đầu - Kết thúc)</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($monhoc->lophocphans as $lophocphan)
                                    <tr>
                                        <td>{{ $lophocphan->tenlop }}</td>
                                        <td>{{ $lophocphan->phonghoc->tenphonghoc ?? 'N/A' }}</td>
                                        <td>{{ $lophocphan->giangvien->ho_ten ?? 'N/A' }}</td>
                                        <td>{{ $lophocphan->soluongsv }}</td>
                                        <td>{{ $lophocphan->thoigianbatdau }} - {{ $lophocphan->thoigianketthuc }}</td>
                                        <td>{{ $lophocphan->ngayhoc }}</td>
                                        <td>{{ $lophocphan->tietbatdau }} - {{ $lophocphan->tietketthuc }}</td>
                                        <td>
                                            <a href="{{ route('admin.lichhoc.edit', $lophocphan->lophoc_ID) }}"
                                                class="btn btn-warning btn-sm">Sửa</a>
                                            <form action="{{ route('admin.lichhoc.destroy', $lophocphan->lophoc_ID) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn có chắc muốn xóa?')" type="submit"
                                                    class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Chưa có lớp học phần cho môn này.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection