<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\LopHocPhan;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class LopHocPhanController extends Controller
{
    public function index()
    {
        // Lấy giảng viên với ID là 1
        $giangvien = GiangVien::find(1); // ID giảng viên là 1 (hoặc lấy từ auth()->user() nếu có hệ thống login)

        if (!$giangvien) {
            return redirect()->back()->with('error', 'Giảng viên không tồn tại');
        }

        // Lấy tất cả lớp học phần mà giảng viên này giảng dạy
        $lophocphans = $giangvien->lophocphans;

        // Trả về view với danh sách lớp học phần
        return view('lecturer.lophocphan_list', compact('lophocphans'));
    }

    // Hiển thị danh sách sinh viên trong lớp học phần
    public function showSinhVien($id)
    {
        $lophocphan = LopHocPhan::find($id);

        if (!$lophocphan) {
            return redirect()->back()->with('error', 'Không tìm thấy lớp học phần');
        }

        $sinhviens = $lophocphan->sinhviens;

        return view('lecturer.sinhvien_list', compact('sinhviens', 'lophocphan'));
    }



}
