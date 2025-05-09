@extends('student.layouts.app')
@section('scripts')
    <script>
        document.querySelectorAll('.form-dangky').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Chặn submit mặc định

                Swal.fire({
                    title: 'Xác nhận xóa học phần',
                    text: 'Bạn có chắc chắn muốn xóa học phần này?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Huỷ bỏ',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit nếu người dùng xác nhận
                    }
                });
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <h2>Các lớp học phần của tôi</h2>
        @if (session('success1'))
            <div class="alert alert-success">{{ session('success1') }}</div>
        @endif
        <a href="{{ route('student.dangkilophocphan.index') }}"
            class="btn btn-danger btn-lg fw-bold shadow px-4 py-2 my-4 rounded-pill ">
            🔥 Đăng ký học phần
        </a>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Tên lớp học phần</th>
                    <th>Môn học</th>
                    <th>Số tín chỉ</th>
                    <th>Phòng học</th>
                    <th>Ngày học</th>
                    <th>Tiết bắt đầu</th>
                    <th>Tiết kết thúc</th>
                    <th>Xem điểm</th>
                    <th>Xóa học phần</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lophocphans as $lop)
                    @if ($lop->monhoc->khoa == $sinhvien->khoa)
                        <tr>
                            <td>{{ $lop->tenlop }}</td>
                            <td>{{ $lop->monhoc->ten_mon_hoc ?? 'Chưa có' }}</td>
                            <td>{{ $lop->monhoc->so_tin_chi }}</td>
                            <td>{{ $lop->phonghoc->tenphonghoc ?? 'Chưa có' }}</td>
                            <td>{{ $lop->ngayhoc }}</td>
                            <td>{{ $lop->tietbatdau }}</td>
                            <td>{{ $lop->tietketthuc }}</td>
                            <td>
                                <a href="{{ route('student.diem.show', ['lophoc_ID' => $lop->lophoc_ID, 'sinhvien_ID' => $sinhvien->sinhvien_ID]) }}"
                                    class="btn btn-info btn-sm" style="display: inline-flex; align-items: center;">
                                    <img src="{{ asset('images/find.png') }}"
                                        style="width: 20px; height: 20px; margin-right: 5px;" />
                                    Xem Điểm
                                </a>

                            </td>
                            <td>
                                <form class="form-dangky"
                                    action="{{ route('student.hocphan.delete', ['lophoc_ID' => $lop->lophoc_ID, 'sinhvien_ID' => $sinhvien->sinhvien_ID]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        style="display: inline-flex; align-items: center;">
                                        <i class="fas fa-trash-alt" style="margin-right: 5px;"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection