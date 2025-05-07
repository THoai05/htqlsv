<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Diem;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiemController extends Controller
{
    // Phương thức xem điểm của sinh viên trong lớp học phần
    public function showDiem($lophoc_ID, $sinhvien_ID)
    {
        // Lấy điểm của sinh viên theo lophoc_ID và sinhvien_ID
        $diem = Diem::where('lophoc_ID', $lophoc_ID)
            ->where('sinhvien_ID', $sinhvien_ID)
            ->first();

        // Trả về view hiển thị điểm của sinh viên
        return view('lecturer.sinhvien.sinhvien_diem', compact('diem', 'lophoc_ID', 'sinhvien_ID'));
    }

    // Phương thức nhập hoặc sửa điểm cho sinh viên
    public function saveDiem(Request $request, $lophoc_ID, $sinhvien_ID)
    {
        // Xác thực dữ liệu
        $request->validate([
            'diem_15p_1' => 'required|numeric|min:0|max:10',
            'diem_15p_2' => 'required|numeric|min:0|max:10',
            'diem_15p_3' => 'required|numeric|min:0|max:10',
            'giua_ki' => 'required|numeric|min:0|max:10',
            'cuoi_ki' => 'required|numeric|min:0|max:10',
        ]);

        // Tính điểm trung bình theo công thức
        $diem_tb = (
            $request->diem_15p_1 +
            $request->diem_15p_2 +
            $request->diem_15p_3 +
            $request->giua_ki * 2 +
            $request->cuoi_ki * 3
        ) / 8;

        // Lưu hoặc cập nhật điểm
        Diem::updateOrCreate(
            ['lophoc_ID' => $lophoc_ID, 'sinhvien_ID' => $sinhvien_ID],
            [
                'diem_15p_1' => $request->diem_15p_1,
                'diem_15p_2' => $request->diem_15p_2,
                'diem_15p_3' => $request->diem_15p_3,
                'giua_ki' => $request->giua_ki,
                'cuoi_ki' => $request->cuoi_ki,
                'diem_tb' => $diem_tb,
            ]
        );

        return redirect()->route('lecturer.diem.show', [
            'lophoc_ID' => $lophoc_ID,
            'sinhvien_ID' => $sinhvien_ID,
        ])->with('success', 'Bạn Đã lưu điểm thành công!');
    }

    public function showDiemSinhVien($lophoc_ID)
    {
        $danhsach = Diem::where('lophoc_ID', $lophoc_ID)
            ->join('sinhvien', 'diem.sinhvien_ID', '=', 'sinhvien.sinhvien_ID')
            ->select(
                'sinhvien.mssv as mssv',
                'sinhvien.hoten',
                'diem.diem_15p_1',
                'diem.diem_15p_2',
                'diem.diem_15p_3',
                'diem.giua_ki',
                'diem.cuoi_ki',
                'diem.diem_tb'
            )
            ->get();
        $lophoc = LopHocPhan::find($lophoc_ID);
        return view('lecturer.sinhvien.baocao_diem', compact('danhsach', 'lophoc_ID', 'lophoc'));
    }
}
