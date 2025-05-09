<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Diem;
use App\Models\SinhVien;
use App\Models\GiangVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LopHocPhanController extends Controller
{
    public function index(Request $request)
    {
        $giangvien = Auth::user()->giangvien; // Lấy giảng viên của người dùng hiện tại

        // Kiểm tra nếu giảng viên tồn tại
        if ($giangvien) {
            $lophocphans = $giangvien->lophocphans; // Lấy danh sách lớp học phần của giảng viên
            return view('lecturer.sinhvien.lophocphan_list', compact('lophocphans'));
        }

        return redirect()->route('login'); // Nếu không tìm thấy giảng viên, chuyển hướng đến trang đăng nhập
    }

    // Hiển thị danh sách sinh viên trong lớp học phần
    public function showSinhVien(Request $request, $id)
    {
        $lophocphan = LopHocPhan::find($id);

        if (!$lophocphan) {
            return redirect()->back()->with('error', 'Không tìm thấy lớp học phần');
        }

        $search = $request->input('search');

        $query = $lophocphan->sinhviens();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('mssv', 'like', '%' . $search . '%')
                    ->orWhere('hoten', 'like', '%' . $search . '%');
            });
        }

        $sinhviens = $query->get();

        return view('lecturer.sinhvien.sinhvien_list', compact('sinhviens', 'lophocphan'));
    }
}
