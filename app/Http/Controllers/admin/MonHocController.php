<?php

namespace App\Http\Controllers\Admin;

use App\Models\MonHoc;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonHocController extends Controller
{
    public function index()
    {
        $monHocs = MonHoc::with('giangVien')->get();
        return view('admin.monhocs.index', compact('monHocs'));
    }

    public function create()
    {
        $giangViens = GiangVien::all();
        return view('admin.monhocs.create', compact('giangViens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ma_mon_hoc' => 'required|unique:mon_hocs,ma_mon_hoc,',
            'ten_mon_hoc' => 'required',
            'so_tin_chi' => 'required|integer',
            'mo_ta' => 'required',
            'khoa' => 'required|in:CNTT,Ngoại ngữ,Toán,QTKD'
        ]);

        MonHoc::create($request->all());

        return redirect()->route('admin.monhocs.index')->with('success', 'Môn học đã được thêm thành công!');
    }

    public function edit($id)
    {
        $monhoc = MonHoc::findOrFail($id); // Lấy dữ liệu môn học theo ID
        $giangviens = GiangVien::all(); // Lấy danh sách giảng viên

        return view('admin.monhocs.edit', compact('monhoc', 'giangviens'));
    }


    public function update(Request $request, $id)
    {
        $monhoc = MonHoc::findOrFail($id); // Tìm môn học theo ID

        $request->validate([
            'ma_mon_hoc' => 'required|unique:mon_hocs,ma_mon_hoc,' . $id,
            'ten_mon_hoc' => 'required',
            'so_tin_chi' => 'required|integer',
            'mota',
            'khoa' => 'required|in:CNTT,Ngoại ngữ,Toán,QTKD'
        ]);

        $monhoc->update($request->all());

        return redirect()->route('admin.monhocs.index')->with('success', 'Cập nhật môn học thành công!');
    }


    public function destroy($id)
    {
        $monhoc = MonHoc::withTrashed()->findOrFail($id);
        $monhoc->forceDelete(); // Xóa vĩnh viễn

        return redirect()->route('admin.monhocs.index')->with('success', 'Môn học đã bị xóa hoàn toàn!');
    }
}
