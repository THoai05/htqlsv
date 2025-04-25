<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiangVien;
use App\Models\LopHocPhan;
use App\Models\Diem;
use App\Models\SinhVien;

class GiangVienController extends Controller
{
    // Hiển thị danh sách giảng viên
    public function index()
    {
        $giangViens = GiangVien::all();
        return view('admin.giangviens.index', compact('giangViens'));
    }

    // Hiển thị form thêm giảng viên
    public function create()
    {
        return view('admin.giangviens.create');
    }

    // Xử lý thêm giảng viên
    public function store(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required',
            'ma_giang_vien' => 'required|unique:giang_viens',
            'khoa' => 'required',
            'email' => 'required|email|unique:giang_viens',
            'so_dien_thoai' => 'required',
        ]);

        GiangVien::create($request->all());
        return redirect()->route('admin.giangviens.index')->with('success', 'Thêm giảng viên thành công!');
    }

    // Hiển thị form sửa giảng viên
    public function edit($id)
    {
        $giangVien = GiangVien::findOrFail($id); // Lấy dữ liệu từ database
        return view('admin.giangviens.edit', compact('giangVien'));
    }




    // Cập nhật thông tin giảng viên
    public function update(Request $request, GiangVien $giangVien)
    {
        // Cập nhật trực tiếp, không kiểm tra trùng lặp mã giảng viên & email
        $giangVien->update([
            'ho_ten' => $request->ho_ten,
            'ma_giang_vien' => $request->ma_giang_vien, // Nếu bạn muốn giữ nguyên, có thể bỏ dòng này
            'khoa' => $request->khoa,
            'email' => $request->email, // Nếu muốn giữ nguyên, bỏ dòng này
            'so_dien_thoai' => $request->so_dien_thoai,
        ]);

        return redirect()->route('admin.giangviens.index')->with('success', 'Cập nhật thông tin thành công!');
    }

    public function showDiem($lophoc_id, $sinhvien_id)
    {
        // Lấy thông tin lớp học phần và sinh viên
        $lophocphan = LopHocPhan::find($lophoc_id);
        $sinhvien = SinhVien::find($sinhvien_id);

        // Lấy điểm của sinh viên trong lớp học phần này
        $diem = Diem::where('lophoc_ID', $lophoc_id)
            ->where('sinhvien_ID', $sinhvien_id)
            ->first();

        return view('lecturer.sinhvien_diem', compact('lophocphan', 'sinhvien', 'diem'));
    }



}
