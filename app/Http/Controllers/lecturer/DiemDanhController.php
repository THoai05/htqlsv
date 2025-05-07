<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Diem;
use App\Models\DiemDanh;
use App\Models\SinhVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiemDanhController extends Controller
{
    // Hiển thị trang điểm danh của lớp học phần
    public function index($id)
    {
        // Lấy thông tin lớp học phần
        $lophocphan = LopHocPhan::find($id);

        if (!$lophocphan) {
            return redirect()->back()->with('error', 'Không tìm thấy lớp học phần');
        }

        $sinhviens = $lophocphan->sinhviens;
        $diemdanh = DiemDanh::where('lophoc_ID', $lophocphan->lophoc_ID)->get();
        return view('lecturer.sinhvien.diemdanh', compact('lophocphan', 'sinhviens', 'diemdanh'));
    }

    // Lưu thông tin điểm danh
    public function store(Request $request, $lophoc_ID)
    {
        $request->validate([
            'co_mat' => 'nullable|array',
            'co_mat.*' => 'boolean',
        ]);

        // Lấy danh sách sinh viên trong lớp
        $lophocphan = LopHocPhan::find($lophoc_ID);

        if (!$lophocphan) {
            return redirect()->back()->with('error', 'Không tìm thấy lớp học phần');
        }

        $sinhviens = $lophocphan->sinhviens;

        // Duyệt qua tất cả sinh viên trong lớp và cập nhật hoặc tạo mới điểm danh
        foreach ($sinhviens as $sinhvien) {
            // Kiểm tra xem sinh viên có mặt hay không
            $co_mat = isset($request->co_mat[$sinhvien->sinhvien_ID]) ? true : false;

            // Cập nhật hoặc tạo mới bản ghi điểm danh
            DiemDanh::updateOrCreate(
                ['lophoc_ID' => $lophoc_ID, 'sinhvien_ID' => $sinhvien->sinhvien_ID],
                ['co_mat' => $co_mat]
            );
        }

        // Trả về trang điểm danh với thông báo thành công
        return redirect()->route('lecturer.diemdanh.index', ['lophoc_ID' => $lophoc_ID])
            ->with('success', 'Điểm danh đã được cập nhật');
    }
}
