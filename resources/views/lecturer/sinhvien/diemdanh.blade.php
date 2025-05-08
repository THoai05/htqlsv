    @extends('lecturer.layouts.app')

    @section('content')
    <div class="container">
        <h1>Điểm danh theo tuần: {{ $lophocphan->ten_lophoc }}</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form method="GET" action="{{ route('lecturer.diemdanh.index', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" class="mb-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group shadow-sm">
                        <input type="text" name="search" class="form-control rounded-left"
                            placeholder="🔍 Tìm theo MSSV hoặc tên sinh viên"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary rounded-right" style="margin-left:20px;" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('lecturer.diemdanh.store', ['lophoc_ID' => $lophocphan->lophoc_ID]) }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        @for($week = 1; $week <= 15; $week++)
                            <th>Tuần {{ $week }}</th>
                            @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach($sinhviens as $sinhvien)
                    <tr>
                        <td>{{ $sinhvien->mssv }}</td>
                        <td>{{ $sinhvien->hoten }}</td>
                        @for($week = 1; $week <= 15; $week++)
                            @php
                            $diemdanh_sv=$diemdanh->where('sinhvien_ID', $sinhvien->sinhvien_ID)
                            ->where('tuan', $week)
                            ->first();
                            @endphp
                            <td>
                                <input type="checkbox"
                                    name="co_mat[{{ $sinhvien->sinhvien_ID }}][{{ $week }}]"
                                    value="1"
                                    @if($diemdanh_sv && $diemdanh_sv->co_mat) checked @endif>
                            </td>
                            @endfor
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Lưu điểm danh</button>
        </form>
    </div>
    @endsection