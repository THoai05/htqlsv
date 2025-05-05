<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MonHocsController extends Controller
{
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        // if (!session('user_id')) {
        //     return redirect()->route('login')->withErrors(['username' => 'Bạn cần đăng nhập để tiếp tục.']);
        // }

        // Lấy danh sách môn học của giảng viên hiện tại
        $monhocs = MonHoc::where('giangvien_id', Auth::id())->get();

        return view('lecturer.monhoc.index', compact('monhocs'));
    }

    public function create()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('user_id')) {
            return redirect()->route('login')->withErrors(['username' => 'Bạn cần đăng nhập để tiếp tục.']);
        }

        return view('lecturer.monhoc.create');
    }

    public function store(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('user_id')) {
            return redirect()->route('login')->withErrors(['username' => 'Bạn cần đăng nhập để tiếp tục.']);
        }

        $validated = $request->validate([
            'ten_mon_hoc' => 'required|string',
            'ma_mon_hoc' => 'required|string|unique:mon_hocs',
            'so_tin_chi' => 'required|integer',
            'mo_ta' => 'nullable|string',
        ]);

        $validated['giang_vien_id'] = Auth::id();

        MonHoc::create($validated);

        return redirect()->route('lecturer.monhoc.index')->with('success', 'Thêm môn học thành công.');
    }

    public function edit($id)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('user_id')) {
            return redirect()->route('login')->withErrors(['username' => 'Bạn cần đăng nhập để tiếp tục.']);
        }

        $monhoc = MonHoc::where('id', $id)->where('giang_vien_id', Auth::id())->firstOrFail();

        return view('lecturer.monhoc.edit', compact('monhoc'));
    }

    public function update(Request $request, $id)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('user_id')) {
            return redirect()->route('login')->withErrors(['username' => 'Bạn cần đăng nhập để tiếp tục.']);
        }

        $monhoc = MonHoc::where('id', $id)->where('giang_vien_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'ten_mon_hoc' => 'required|string',
            'ma_mon_hoc' => 'required|string|unique:mon_hocs,ma_mon_hoc,' . $monhoc->id,
            'so_tin_chi' => 'required|integer',
            'mo_ta' => 'nullable|string',
        ]);

        $monhoc->update($validated);

        return redirect()->route('lecturer.monhoc.index')->with('success', 'Cập nhật môn học thành công.');
    }

    public function destroy($id)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('user_id')) {
            return redirect()->route('login')->withErrors(['username' => 'Bạn cần đăng nhập để tiếp tục.']);
        }

        $monhoc = MonHoc::where('id', $id)->where('giang_vien_id', Auth::id())->firstOrFail();
        $monhoc->delete();

        return redirect()->route('lecturer.monhoc.index')->with('success', 'Xóa môn học thành công.');
    }
}
