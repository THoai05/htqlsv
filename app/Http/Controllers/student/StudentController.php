<?php

namespace App\Http\Controllers\Student;

use App\Models\Diem;
use App\Models\LopHocPhan;
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

    public function showDiem($lophoc_ID, $sinhvien_ID)
    {

        // Lấy điểm của sinh viên theo lophoc_ID và sinhvien_ID
        $lophocphan = LopHocPhan::find($lophoc_ID);
        $diem = Diem::where('lophoc_ID', $lophoc_ID)
            ->where('sinhvien_ID', $sinhvien_ID)
            ->first();

        // Trả về view hiển thị điểm của sinh viên
        return view('student.diem', compact('diem', 'lophoc_ID', 'sinhvien_ID', 'lophocphan'));

    }
}
