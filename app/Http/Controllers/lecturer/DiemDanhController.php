<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\DiemDanh;
use App\Models\SinhVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiemDanhController extends Controller
{
    // Hiển thị trang điểm danh của lớp học phần
    public function index(Request $request, $id)
    {
        // Lấy thông tin lớp học phần
        $lophocphan = LopHocPhan::find($id);

        if (!$lophocphan) {
            return redirect()->back()->with('error', 'Không tìm thấy lớp học phần');
        }

        // Bắt đầu query danh sách sinh viên
        $query = $lophocphan->sinhviens();

        // Nếu có từ khóa tìm kiếm, thêm điều kiện lọc
        if ($request->has('search') && $request->search) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('mssv', 'like', "%$keyword%")
                    ->orWhere('hoten', 'like', "%$keyword");
            });
        }

        // Lấy kết quả sinh viên sau khi lọc (nếu có)
        $sinhviens = $query->get();

        // Lấy danh sách điểm danh của lớp học phần
        $diemdanh = DiemDanh::where('lophoc_ID', $lophocphan->lophoc_ID)->get();

        return view('lecturer.sinhvien.diemdanh', compact('lophocphan', 'sinhviens', 'diemdanh'));
    }


    // Lưu thông tin điểm danh
    // Lưu thông tin điểm danh theo từng tuần
    public function store(Request $request, $lophoc_ID)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'co_mat' => 'nullable|array',
            'tuan' => 'required|integer|min:1|max:15',
        ]);

        // Lấy số tuần được gửi từ form
        $tuan = $request->tuan;

        // Tìm lớp học phần
        $lophocphan = LopHocPhan::find($lophoc_ID);

        if (!$lophocphan) {
            return redirect()->back()->with('error', 'Không tìm thấy lớp học phần');
        }

        // Lấy danh sách sinh viên của lớp học phần
        $sinhviens = $lophocphan->sinhviens;

        // Duyệt qua từng sinh viên để lưu điểm danh cho tuần đã chọn
        foreach ($sinhviens as $sinhvien) {
            $coMat = isset($request->co_mat[$sinhvien->sinhvien_ID]) ? true : false;

            // Cập nhật hoặc tạo mới bản ghi điểm danh
            DiemDanh::updateOrCreate(
                [
                    'lophoc_ID' => $lophoc_ID,
                    'sinhvien_ID' => $sinhvien->sinhvien_ID,
                    'tuan' => $tuan,
                ],
                [
                    'co_mat' => $coMat,
                ]
            );
        }

        // Trả về thông báo thành công
        return redirect()->route('lecturer.diemdanh.index', ['lophoc_ID' => $lophoc_ID])
            ->with('success', 'Điểm danh tuần ' . $tuan . ' đã được cập nhật');
    }
}
