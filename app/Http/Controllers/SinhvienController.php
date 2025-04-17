<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use Illuminate\Http\Request;

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
        $request->validate([
            'hoten' => 'required|string|max:255',
            'mssv' => 'required|string|max:50|unique:sinhvien,mssv',
            'email' => 'required|email|max:100|unique:sinhvien,email',
            'sdt' => 'required|string|max:15|unique:sinhvien,sdt',
        ]);

        Sinhvien::create($request->all());

        return redirect()->route('admin.sinhvien.index')->with('success', 'Thêm sinh viên thành công!');
    }

    public function edit($sinhvien_ID)
    {
        $sinhvien = Sinhvien::where('sinhvien_ID', $sinhvien_ID)->firstOrFail();
        return view('admin.sinhvien.edit', compact('sinhvien'));
    }



    public function update(Request $request, $sinhvien_ID)
    {
        $sinhvien = Sinhvien::where('sinhvien_ID', $sinhvien_ID)->firstOrFail();

        $request->validate([
            'hoten' => 'required|string|max:255',
            'mssv' => 'required|string|max:50|unique:sinhvien,mssv,' . $sinhvien_ID . ',sinhvien_ID',
            'email' => 'required|email|max:100|unique:sinhvien,email,' . $sinhvien_ID . ',sinhvien_ID',
            'sdt' => 'required|string|max:15|unique:sinhvien,sdt,' . $sinhvien_ID . ',sinhvien_ID',
        ]);

        $sinhvien->update($request->all());

        return redirect()->route('admin.sinhvien.index')->with('success', 'Cập nhật sinh viên thành công!');
    }


    public function destroy($sinhvien_ID)
    {
        $sinhvien = Sinhvien::where('sinhvien_ID', $sinhvien_ID)->firstOrFail();
        $sinhvien->delete();

        return redirect()->route('admin.sinhvien.index')->with('success', 'Xóa sinh viên thành công!');
    }
}
