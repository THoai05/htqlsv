<?php

namespace App\Http\Controllers\Admin;

use App\Models\MonHoc;
use App\Models\PhongHoc;
use App\Models\GiangVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LichHocController extends Controller
{
    // Hiển thị trang lịch học với danh sách các môn học và lớp học phần liên quan
    public function index()
    {
        // Lấy tất cả môn học kèm theo lớp học phần (với các quan hệ phòng học, giảng viên)
        $monhocs = MonHoc::with([
            'lophocphans.phonghoc',
            'lophocphans.giangvien'
        ])->get();

        return view('admin.lichhoc.index', compact('monhocs'));
    }

    // Hiển thị form tạo mới lớp học phần
    public function create()
    {
        // Lấy danh sách các môn học, phòng học và giảng viên
        $monhocs = MonHoc::all();
        $phonghocs = PhongHoc::all();
        $giangviens = GiangVien::all();

        return view('admin.lichhoc.create', compact('monhocs', 'phonghocs', 'giangviens'));
    }

    // Lưu lớp học phần mới
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'tenlop' => 'required|string|max:255',
            'mamonhoc' => 'required|exists:mon_hocs,id',
            'phonghoc_ID' => 'required|exists:phonghoc,phonghoc_ID',
            'giangvien_ID' => 'required|exists:giang_viens,id',
            'soluongsvtoida' => 'required|integer',
            'thoigianbatdau' => 'required|date',
            'thoigianketthuc' => 'required|date|after_or_equal:thoigianbatdau',
            'ngayhoc' => 'required|string',
            'tietbatdau' => 'required|integer',
            'tietketthuc' => 'required|integer|gte:tietbatdau',
        ]);

        // Sử dụng create() để lưu dữ liệu (Model phải có $fillable phù hợp)
        LopHocPhan::create($request->all());

        return redirect()->route('admin.lichhoc.index')->with('success', 'Thêm lớp học phần thành công!');
    }

    // Hiển thị form chỉnh sửa lớp học phần theo khóa chính lophoc_ID (được truyền thủ công)
    public function edit($lophoc_ID)
    {
        // Truy xuất lớp học phần bằng lophoc_ID theo cách thủ công
        $lophocphan = LopHocPhan::where('lophoc_ID', $lophoc_ID)->firstOrFail();
        $monhocs = MonHoc::all();
        $phonghocs = PhongHoc::all();
        $giangviens = GiangVien::all();

        return view('admin.lichhoc.edit', compact('lophocphan', 'monhocs', 'phonghocs', 'giangviens'));
    }

    // Cập nhật lớp học phần theo lophoc_ID
    public function update(Request $request, $lophoc_ID)
    {
        $lophocphan = LopHocPhan::where('lophoc_ID', $lophoc_ID)->firstOrFail();

        $request->validate([
            'tenlop' => 'required|string|max:255',
            'mamonhoc' => 'required|exists:mon_hocs,id',
            'phonghoc_ID' => 'required|exists:phonghoc,phonghoc_ID',
            'giangvien_ID' => 'required|exists:giang_viens,id',
            'soluongsvtoida' => 'required|integer',
            'thoigianbatdau' => 'required|date',
            'thoigianketthuc' => 'required|date|after_or_equal:thoigianbatdau',
            'ngayhoc' => 'required|string',
            'tietbatdau' => 'required|integer',
            'tietketthuc' => 'required|integer|gte:tietbatdau',
        ]);

        $lophocphan->update($request->all());

        return redirect()->route('admin.lichhoc.index')->with('success', 'Cập nhật lớp học phần thành công!');
    }

    // Xóa lớp học phần theo lophoc_ID
    public function destroy($lophoc_ID)
    {
        $lophocphan = LopHocPhan::where('lophoc_ID', $lophoc_ID)->firstOrFail();
        $lophocphan->delete();

        return redirect()->route('admin.lichhoc.index')->with('success', 'Xóa lớp học phần thành công!');
    }
}
