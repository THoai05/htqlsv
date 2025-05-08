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
                    ->orWhere('hoten', 'like', "%$keyword%");
            });
        }

        // Lấy kết quả sinh viên sau khi lọc (nếu có)
        $sinhviens = $query->get();

        // Lấy danh sách điểm danh của lớp học phần
        $diemdanh = DiemDanh::where('lophoc_ID', $lophocphan->lophoc_ID)->get();

        return view('lecturer.sinhvien.diemdanh', compact('lophocphan', 'sinhviens', 'diemdanh'));
    }


    // Lưu thông tin điểm danh
    public function store(Request $request, $lophoc_ID)
    {
        // Kiểm tra và validate dữ liệu
        $request->validate([
            'co_mat' => 'nullable|array',
        ]);

        // Lấy lớp học phần
        $lophocphan = LopHocPhan::find($lophoc_ID);

        if (!$lophocphan) {
            return redirect()->back()->with('error', 'Không tìm thấy lớp học phần');
        }

        // Lấy danh sách sinh viên trong lớp học phần
        $sinhviens = $lophocphan->sinhviens;

        // Duyệt qua tất cả sinh viên trong lớp
        foreach ($sinhviens as $sinhvien) {
            // Duyệt qua từng tuần (từ tuần 1 đến tuần 15)
            for ($tuan = 1; $tuan <= 15; $tuan++) {
                // Kiểm tra xem sinh viên có mặt hay không trong tuần
                $coMat = isset($request->co_mat[$sinhvien->sinhvien_ID][$tuan]) ? true : false;

                // Cập nhật hoặc tạo mới thông tin điểm danh cho sinh viên
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
        }

        // Sau khi lưu, trả về thông báo thành công
        return redirect()->route('lecturer.diemdanh.index', ['lophoc_ID' => $lophoc_ID])
            ->with('success', 'Điểm danh đã được cập nhật');
    }
}
