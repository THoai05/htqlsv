<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $sinhvien = Auth::user()->sinhvien; // Lấy giảng viên của người dùng hiện tại

        // Kiểm tra nếu giảng viên tồn tại
        if ($sinhvien) {
            $lophocphans = $sinhvien->lopHocPhans; // Lấy danh sách lớp học phần của giảng viên
            return view('student.lophocphan_list', compact('lophocphans', 'sinhvien'));
        }

        return redirect()->route('login'); // Nếu không tìm thấy giảng viên, chuyển hướng đến trang đăng nhập
    }

    public function chiTietThongTin()
    {
        $sinhvien = Auth::user()->sinhvien;
        return view('student.chitietthongtin', compact('sinhvien'));
    }
}
