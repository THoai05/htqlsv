<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    // Hiển thị danh sách users
    public function index()
    {
        $users = User::all();   
        return view('admin.users.index', ['users' => $users]);
    }

    // Hiển thị form thêm user
    public function create()
    {
        return view('admin.users.create');
    }

    // Xử lý thêm user
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,sinhvien,giangvien',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User đã được thêm thành công!');
    }

    // Hiển thị form sửa user
    public function edit($user_ID)
    {
        $user = User::findOrFail($user_ID);
        return view('admin.users.edit', ['user' => $user]);
    }

    // Xử lý cập nhật user
    public function update(Request $request, $user_ID)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $user_ID . ',user_ID',
            'role' => 'required|in:admin,sinhvien,giangvien',
            'password' => 'nullable|min:6', // Chỉ kiểm tra mật khẩu nếu có thay đổi
        ]);

        $user = User::findOrFail($user_ID);
        $user->username = $request->username;
        $user->role = $request->role;

        // Kiểm tra nếu mật khẩu mới có được nhập vào không
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User đã được cập nhật!');
    }

    // Xử lý xóa user
    public function destroy($user_ID)
    {
        $user = User::findOrFail($user_ID);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User đã bị xóa!');
    }
}
