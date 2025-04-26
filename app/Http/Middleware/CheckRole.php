<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Lấy user hiện tại
        $user = Auth::user();

        // Kiểm tra nếu user không đăng nhập
        if (!$user) {
            abort(403, 'Bạn chưa đăng nhập.');
        }

        // Kiểm tra quyền admin
        if ($user->role === 'admin' && in_array('admin', $roles)) {
            return $next($request);
        }

        // Kiểm tra nếu người dùng là giảng viên và role khớp
        $giangVien = $user->giangvien; // Quan hệ với giảng viên

        if ($giangVien && in_array($giangVien->role, $roles)) {
            return $next($request);
        }

        // Nếu không có quyền truy cập
        abort(403, 'Bạn không có quyền truy cập.');
    }
}
