<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Lấy dữ liệu từ request
        $credentials = $request->only('username', 'password');

        // Kiểm tra nếu người dùng nhập đúng thông tin đăng nhập
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $user = Auth::user();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            // dd($user);  // Kiểm tra thông tin user

            if ($user->role === 'admin') {
                return redirect()->route('admin.users.index');
            }

            if ($user->role === 'giangvien') {
                return redirect()->route('lecturer.monhoc.index');
            }
        }

        // Nếu thông tin đăng nhập không đúng
        return redirect()->back()->withErrors(['username' => 'Thông tin đăng nhập không đúng.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
