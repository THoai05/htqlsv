@extends('student.layouts.app')

@section('content')
<div class="container">
    <h2>Lịch Học Của Tôi</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Phòng Học</th>
                <th>Thứ 2</th>
                <th>Thứ 3</th>
                <th>Thứ 4</th>
                <th>Thứ 5</th>
                <th>Thứ 6</th>
                <th>Thứ 7</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lichHoc as $phongHoc => $days)
            <tr>
                <td class="table-secondary"><strong>{{ $phongHoc }}</strong></td>

                @foreach (['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'] as $day)
                <td class="table-light">
                    @if (isset($days[$day]))
                    @foreach ($days[$day] as $class)
                    <div><strong>{{ $class['class'] }}</strong></div>
                    <div>{{ $class['monhoc'] }} ({{ $class['sotinchi'] }} TC)</div>
                    <div>Tiết: {{ $class['time'] }}</div>
                    <div>Giảng viên: {{ $class['giangvien'] }}</div>
                    @endforeach
                    @else
                    <div class="text-muted">Không có lớp</div>
                    @endif
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection