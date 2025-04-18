<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Điều hướng theo role
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect()->route('admin.users.index');
            } elseif ($role === 'giangvien') {
                return redirect('/lecturer'); // Cập nhật route đúng của bạn
            } elseif ($role === 'sinhvien') {
                return redirect('/student'); // Tùy theo route sinh viên
            }

            return redirect('/'); // fallback
        }

        return back()->withErrors([
            'username' => 'Sai tài khoản hoặc mật khẩu.',
        ]);
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
