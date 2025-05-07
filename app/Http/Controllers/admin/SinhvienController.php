<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sinhvien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SinhvienController extends Controller
{
    public function index()
    {
        $sinhviens = Sinhvien::all();
        return view('admin.sinhvien.index', compact('sinhviens'));
    }

    public function create()
    {
        return view('admin.sinhvien.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'hoten' => 'required|string|max:255',
            'mssv' => 'required|string|max:50|unique:sinhvien,mssv',
            'email' => 'required|email|max:100|unique:sinhvien,email',
            'sdt' => 'required|string|max:15|unique:sinhvien,sdt',
            'cccd' => 'nullable|string|max:20', // Thêm validation cho cccd nếu có
            'ngaysinh' => 'nullable|date',
            'gioitinh' => 'nullable|in:Nam,Nữ',
            'dantoc' => 'nullable|string|max:100',
            'tongiao' => 'nullable|string|max:100',
            'noisinh' => 'nullable|string|max:255',
            'tinhtrang' => 'nullable|string|max:100', // Thêm các trường khác nếu cần
        ]);

        // Lưu sinh viên
        Sinhvien::create($request->only([
            'hoten',
            'mssv',
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

        return redirect()->route('admin.sinhvien.index')->with('success', 'Thêm sinh viên thành công!');
    }

    public function edit($sinhvien_ID)
    {
        $sinhvien = Sinhvien::findOrFail($sinhvien_ID);
        return view('admin.sinhvien.edit', compact('sinhvien'));
    }

    public function update(Request $request, $sinhvien_ID)
    {
        $sinhvien = Sinhvien::findOrFail($sinhvien_ID);

        // Validation
        $request->validate([
            'hoten' => 'required|string|max:255',
            'mssv' => 'required|string|max:50|unique:sinhvien,mssv,' . $sinhvien_ID . ',sinhvien_ID',
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
            'mssv',
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

        return redirect()->route('admin.sinhvien.index')->with('success', 'Cập nhật sinh viên thành công!');
    }


    public function destroy($sinhvien_ID)
    {
        $sinhvien = Sinhvien::where('sinhvien_ID', $sinhvien_ID)->firstOrFail();
        $sinhvien->delete();

        return redirect()->route('admin.sinhvien.index')->with('success', 'Xóa sinh viên thành công!');
    }
}
