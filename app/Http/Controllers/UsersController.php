<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Hiển thị danh sách users
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    // Hiển thị form thêm user
    public function create()
    {
        return view('users.create');
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

        return redirect('/users')->with('success', 'User đã được thêm thành công!');
    }

    // Hiển thị form sửa user
    public function edit($user_ID)
    {
        $user = User::findOrFail($user_ID);
        return view('users.edit', ['user' => $user]);
    }

    // Xử lý cập nhật user
    public function update(Request $request, $user_ID)
    {
        $request->validate([
           'username' => 'required|unique:users,username,' . $user_ID . ',user_ID',
            'role' => 'required|in:admin,sinhvien,giangvien',
        ]);

        $user = User::findOrFail($user_ID);
        $user->username = $request->username;
        $user->role = $request->role;
        $user->save();

        return redirect('/users')->with('success', 'User đã được cập nhật!');
    }

    // Xử lý xóa user
    public function destroy($user_ID)
    {
        $user = User::findOrFail($user_ID);
        $user->delete();
        return redirect('/users')->with('success', 'User đã bị xóa!');
    }
}
