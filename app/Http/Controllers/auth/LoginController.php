<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Lấy thông tin đăng nhập từ request
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Lưu thông tin người dùng vào session
            session(['user_id' => Auth::id()]);

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.users.index');
            }

            if ($user->role === 'giangvien') {
                return redirect()->route('lecturer.monhoc.index');
            }
        }

        return redirect()->back()->withErrors(['username' => 'Thông tin đăng nhập không đúng.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
