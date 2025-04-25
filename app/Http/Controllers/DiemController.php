<?php

namespace App\Http\Controllers;

use App\Models\Diem;
use Illuminate\Http\Request;

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
        return view('lecturer.sinhvien_diem', compact('diem', 'lophoc_ID', 'sinhvien_ID'));
    }

    // Phương thức nhập hoặc sửa điểm cho sinh viên
    public function saveDiem(Request $request, $lophoc_ID, $sinhvien_ID)
    {
        // Xác thực dữ liệu nhập vào
        $request->validate([
            'diem' => 'required|numeric|min:0|max:10',
        ]);

        // Thêm mới hoặc cập nhật điểm của sinh viên
        $diem = Diem::updateOrCreate(
            ['lophoc_ID' => $lophoc_ID, 'sinhvien_ID' => $sinhvien_ID],
            ['diem' => $request->diem]
        );

        // Quay lại trang xem điểm sau khi lưu
        return redirect()->route('lecturer.diem.show', ['lophoc_ID' => $lophoc_ID, 'sinhvien_ID' => $sinhvien_ID])
            ->with('success', 'Điểm đã được lưu thành công');
    }
}
