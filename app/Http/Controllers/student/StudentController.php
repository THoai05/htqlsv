<?php

namespace App\Http\Controllers\Student;

use App\Models\Diem;
use App\Models\LopHocPhan;
use App\Models\LopSinhVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PhongHoc;
use App\Models\SinhVien;

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

    public function indexDangKi(Request $request)
    {
        $sinhvien = Auth::user()->sinhvien;
        $lophocphans = LopHocPhan::all();

        // Kiểm tra nếu giảng viên tồn tại
        if ($sinhvien) {
            return view('student.dangkihocphan', compact('lophocphans', 'sinhvien'));
        }
    }

    public function storeDangKi(Request $request, $lophoc_ID, $sinhvien_ID)
    {
        $exists = LopSinhVien::where('lophoc_ID', $lophoc_ID)
            ->where('sinhvien_ID', $sinhvien_ID)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Bạn đã đăng ký lớp học này rồi!');
        }
        $lophocphan = LopHocPhan::where('lophoc_ID', $lophoc_ID)->first();
        if ($lophocphan->soluongsv >= $lophocphan->soluongsvtoida) {
            return back()->with('error1', 'Lớp đã đủ số lượng');
        }

        LopSinhVien::create([
            'lophoc_ID' => $lophoc_ID,
            'sinhvien_ID' => $sinhvien_ID
        ]);
        LopHocPhan::where('lophoc_ID', $lophoc_ID)->increment('soluongsv');

        return redirect()->route('student.dangkilophocphan.index')->with('success', 'Đăng kí môn học thành công.');
    }

    public function deleteHocPhan($lophoc_ID, $sinhvien_ID)
    {
        LopSinhVien::where('lophoc_ID', $lophoc_ID)
            ->where('sinhvien_ID', $sinhvien_ID)
            ->delete();

        return back()->with('success1', 'Đã xóa lớp học phần thành công');
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
    public function lichHoc()
    {
        // Lấy thông tin sinh viên hiện tại
        $sinhvien = Auth::user()->sinhvien;

        // Lấy danh sách các lớp học phần mà sinh viên đã đăng ký
        $lopHocPhans = $sinhvien->lopHocPhans;

        // Tạo mảng để lưu lịch học
        $lichHoc = [];

        // Lọc theo phòng học và ngày học
        foreach ($lopHocPhans as $lopHocPhan) {
            // Lấy thông tin môn học, giảng viên và phòng học
            $monhoc = $lopHocPhan->monhoc;
            $giangvien = $lopHocPhan->giangvien;
            $phonghoc = $lopHocPhan->phonghoc;

            // Phân loại theo phòng học và ngày học
            $ngayhocArr = explode(',', $lopHocPhan->ngayhoc);
            foreach ($ngayhocArr as $ngayhocTV) {
                $ngayhocTV = trim($ngayhocTV);

                // Chỉ xử lý nếu ngày học hợp lệ
                if (in_array($ngayhocTV, ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'])) {
                    // Lưu thông tin vào mảng lichHoc
                    $lichHoc[$phonghoc->tenphonghoc][$ngayhocTV][] = [
                        'class' => $lopHocPhan->tenlop,
                        'monhoc' => $monhoc->ten_mon_hoc,
                        'sotinchi' => $monhoc->so_tin_chi,
                        'giangvien' => $giangvien->ho_ten,
                        'time' => 'Tiết ' . $lopHocPhan->tietbatdau . ' - ' . $lopHocPhan->tietketthuc,
                    ];
                }
            }
        }

        return view('student.lichhoc', compact('lichHoc'));
    }

    public function update(Request $request, $sinhvien_ID)
    {
        $sinhvien = Sinhvien::findOrFail($sinhvien_ID);

        // Validation
        $request->validate([
            'hoten' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:sinhvien,email,' . $sinhvien_ID . ',sinhvien_ID',
            'sdt' => 'required|string|max:15|unique:sinhvien,sdt,' . $sinhvien_ID . ',sinhvien_ID',
            'cccd' => 'nullable|string|max:20', // Thêm validation cho cccd nếu có
            'ngaysinh' => 'nullable|date',
            'gioitinh' => 'nullable|in:Nam,Nữ',
            'dantoc' => 'nullable|string|max:100',
            'tongiao' => 'nullable|string|max:100',
            'noisinh' => 'nullable|string|max:255',
            'tinhtrang' => 'nullable|string|max:100',
        ]);

        // Cập nhật thông tin sinh viên
        $sinhvien->update($request->only([
            'hoten',
            'email',
            'sdt',
            'cccd',
            'ngaysinh',
            'gioitinh',
            'dantoc',
            'tongiao',
            'noisinh',
            'tinhtrang'
        ]));

        return redirect()->route('student.chitietthongtin', $sinhvien->sinhvien_ID)->with('success', 'Cập nhật sinh viên thành công!');
    }

    public function edit($sinhvien_ID)
    {
        $sinhvien = Sinhvien::findOrFail($sinhvien_ID);
        return view('student.chinhsuachitiet', compact('sinhvien'));
    }
}
