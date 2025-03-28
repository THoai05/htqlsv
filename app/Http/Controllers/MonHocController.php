<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use App\Models\GiangVien;
use Illuminate\Http\Request;

class MonHocController extends Controller {
    public function index() {
        $monHocs = MonHoc::with('giangVien')->get();
        return view('monhocs.index', compact('monHocs'));
    }

    public function create() {
        $giangViens = GiangVien::all();
        return view('monhocs.create', compact('giangViens'));
    }

    public function store(Request $request) {
        $request->validate([
            'ten_mon_hoc' => 'required|string|max:255',
            'ma_mon_hoc' => 'required|string|unique:mon_hocs,ma_mon_hoc',
            'so_tin_chi' => 'required|integer|min:1',
            'giang_vien_id' => 'nullable|exists:giang_viens,id',
            'mo_ta' => 'nullable|string',
        ]);

        MonHoc::create($request->all());

        return redirect()->route('monhocs.index')->with('success', 'Môn học đã được thêm thành công!');
    }

    public function edit($id)
    {
        $monhoc = MonHoc::findOrFail($id); // Lấy dữ liệu môn học theo ID
        $giangviens = GiangVien::all(); // Lấy danh sách giảng viên
    
        return view('monhocs.edit', compact('monhoc', 'giangviens'));
    }
    

    public function update(Request $request, $id)
    {
        $monhoc = MonHoc::findOrFail($id); // Tìm môn học theo ID
    
        $request->validate([
            'ma_mon_hoc' => 'required|unique:mon_hocs,ma_mon_hoc,' . $id,
            'ten_mon_hoc' => 'required',
            'so_tin_chi' => 'required|integer',
            'giang_vien_id' => 'required|exists:giang_viens,id',
        ]);
    
        $monhoc->update($request->all());
    
        return redirect()->route('monhocs.index')->with('success', 'Cập nhật môn học thành công!');
    }
    

    public function destroy($id) {
        $monhoc = MonHoc::withTrashed()->findOrFail($id);
        $monhoc->forceDelete(); // Xóa vĩnh viễn
    
        return redirect()->route('monhocs.index')->with('success', 'Môn học đã bị xóa hoàn toàn!');
    }
    
}
