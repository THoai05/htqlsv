<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use \Illuminate\Validation;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.users.index');
            }
            if ($user->role === 'giangvien') {
                return redirect()->route('lecturer.lophocphan.index');
            }
            if ($user->role === 'sinhvien') {
                return redirect()->route('student.lophocphan.index');
            }
        }
        throw \Illuminate\Validation\ValidationException::withMessages([
            'credentials' => 'Nhap sai du lieu'
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
