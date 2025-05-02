<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonHoc;
use Illuminate\Support\Facades\Auth;

class MonHocsController extends Controller
{
    public function index()
    {
        // $monhocs = MonHoc::where('giang_vien_id', Auth::id())->get();
        return view('lecturer.logintest');
    }

    public function create()
    {
        return view('lecturer.monhoc.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_mon_hoc' => 'required|string',
            'ma_mon_hoc' => 'required|string|unique:mon_hocs',
            'so_tin_chi' => 'required|integer',
            'mo_ta' => 'nullable|string',
        ]);

        $validated['giang_vien_id'] = Auth::id();

        MonHoc::create($validated);

        return redirect()->route('monhoc.index')->with('success', 'Thêm môn học thành công.');
    }

    public function edit($id)
    {
        $monhoc = MonHoc::where('id', $id)->where('giang_vien_id', Auth::id())->firstOrFail();
        return view('lecturer.monhoc.edit', compact('monhoc'));
    }

    public function update(Request $request, $id)
    {
        $monhoc = MonHoc::where('id', $id)->where('giang_vien_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'ten_mon_hoc' => 'required|string',
            'ma_mon_hoc' => 'required|string|unique:mon_hocs,ma_mon_hoc,' . $monhoc->id,
            'so_tin_chi' => 'required|integer',
            'mo_ta' => 'nullable|string',
        ]);

        $monhoc->update($validated);

        return redirect()->route('monhoc.index')->with('success', 'Cập nhật môn học thành công.');
    }

    public function destroy($id)
    {
        $monhoc = MonHoc::where('id', $id)->where('giang_vien_id', Auth::id())->firstOrFail();
        $monhoc->delete();

        return redirect()->route('monhoc.index')->with('success', 'Xóa môn học thành công.');
    }
}
