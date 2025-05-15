<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GiangVien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class GiangVienController extends Controller
{
    // Hiển thị danh sách giảng viên
    public function index()
    {
        $giangViens = GiangVien::all();
        return view('admin.giangviens.index', compact('giangViens'));
    }

    // Hiển thị form thêm giảng viên
    public function create()
    {
        return view('admin.giangviens.create');
    }

    // Xử lý thêm giảng viên
    public function store(Request $request)
    {
        // Validate dữ liệu giảng viên
        $request->validate([
            'ho_ten' => 'required',
            'ma_giang_vien' => 'required|unique:giang_viens',
            'khoa' => 'required',
            'email' => 'required|email|unique:giang_viens',
            'so_dien_thoai' => 'required',
        ]);

        // Tìm user cuối cùng có username dạng 'giangvien%'
        $lastUser = DB::table('users')
            ->where('username', 'like', 'giangvien%')
            ->orderByDesc(DB::raw('CAST(SUBSTRING(username, 10) AS UNSIGNED)')) // "giangvien" dài 9 ký tự, nên bắt đầu từ 10
            ->first();

        $nextNumber = 1;
        if ($lastUser) {
            $lastNumber = (int) substr($lastUser->username, 9);
            $nextNumber = $lastNumber + 1;
        }

        $newUsername = 'giangvien' . $nextNumber;

        // Tạo user mới cho giảng viên
        $user = User::create([
            'username' => $newUsername,
            'password' => Hash::make('123456'), // mật khẩu mặc định
            'role' => 'giangvien',
        ]);

        // Tạo giảng viên mới và gán user_id
        $giangvienData = $request->only([
            'ho_ten',
            'ma_giang_vien',
            'khoa',
            'email',
            'so_dien_thoai',
        ]);
        $giangvienData['user_id'] = $user->user_ID; // nhớ dùng user_ID nếu primary key là vậy

        GiangVien::create($giangvienData);

        return redirect()->route('admin.giangviens.index')
            ->with('success', 'Thêm giảng viên và tài khoản thành công!');
    }

    // Hiển thị form sửa giảng viên
    public function edit($id)
    {
        $giangVien = GiangVien::findOrFail($id); // Lấy dữ liệu từ database
        return view('admin.giangviens.edit', compact('giangVien'));
    }




    // Cập nhật thông tin giảng viên
    public function update(Request $request, $id)
    {
        $giangVien = GiangVien::findOrFail($id);

        $request->validate([
            'ho_ten' => 'required',
            'ma_giang_vien' => 'required|unique:giang_viens,ma_giang_vien,' . $id,
            'khoa' => 'required',
            'email' => 'required|email|unique:giang_viens,email,' . $id,
            'so_dien_thoai' => 'required',
        ]);

        $giangVien->update($request->only([
            'ho_ten',
            'ma_giang_vien',
            'khoa',
            'email',
            'so_dien_thoai',
        ]));

        return redirect()->route('admin.giangviens.index')
            ->with('success', 'Cập nhật giảng viên thành công!');
    }
    public function destroy($id)
    {
        $giangVien = GiangVien::findOrFail($id);

        // Nếu bạn dùng soft delete thì forceDelete để xóa hẳn
        $giangVien->forceDelete();

        return redirect()->route('admin.giangviens.index')->with('success', 'Xóa giảng viên thành công!');
    }
}
