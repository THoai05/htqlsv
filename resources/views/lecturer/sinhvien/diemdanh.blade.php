    @extends('lecturer.layouts.app')

    @section('content')
    <div class="container">
        <h1>Điểm danh theo tuần: {{ $lophocphan->ten_lophoc }}</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

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