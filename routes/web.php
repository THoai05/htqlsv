<?php

use Illuminate\Support\Facades\Route;

// Import controller ở đầu file
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\MonHocController;
use App\Http\Controllers\Admin\LichHocController;
use App\Http\Controllers\Lecturer\DiemController;
use App\Http\Controllers\Admin\SinhvienController;
use App\Http\Controllers\Admin\GiangVienController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Lecturer\MonHocsController;
use App\Http\Controllers\Lecturer\DiemDanhController;
use App\Http\Controllers\Lecturer\LopHocPhanController;


// Trang welcome
Route::get('/', function () {
    return view('welcome');
});


// Group các route thuộc khu vực admin
Route::prefix('admin')->name('admin.')->group(function () {

    // Route sinh viên (ngoài admin)
    Route::resource('sinhvien', SinhvienController::class);
    // Giảng viên
    Route::resource('giangviens', GiangVienController::class);

    // Môn học
    Route::resource('monhocs', MonHocController::class);

    // Lịch học
    Route::get('lichhoc', [LichHocController::class, 'index'])->name('lichhoc.index');
    Route::get('lichhoc/create', [LichHocController::class, 'create'])->name('lichhoc.create');
    Route::post('lichhoc', [LichHocController::class, 'store'])->name('lichhoc.store');
    Route::get('lichhoc/{lophoc_ID}/edit', [LichHocController::class, 'edit'])->name('lichhoc.edit');
    Route::put('lichhoc/{lophoc_ID}', [LichHocController::class, 'update'])->name('lichhoc.update');
    Route::delete('lichhoc/{lophoc_ID}', [LichHocController::class, 'destroy'])->name('lichhoc.destroy');

    // Users
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});


Route::middleware('web')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::prefix('lecturer')->name('lecturer.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/monhoc', [MonHocsController::class, 'index'])->name('monhoc.index');
    Route::get('/monhoc/create', [MonHocsController::class, 'create'])->name('monhoc.create');
    Route::post('/monhoc', [MonHocsController::class, 'store'])->name('monhoc.store');
    Route::get('/monhoc/{id}/edit', [MonHocsController::class, 'edit'])->name('monhoc.edit');
    Route::put('/monhoc/{id}', [MonHocsController::class, 'update'])->name('monhoc.update');
    Route::delete('/monhoc/{id}', [MonHocsController::class, 'destroy'])->name('monhoc.destroy');
    Route::get('diem/{lophoc_ID}/{sinhvien_ID}', [DiemController::class, 'showDiem'])->name('diem.show');

    // Route lưu điểm (thêm hoặc cập nhật)
    Route::post('diem/{lophoc_ID}/{sinhvien_ID}', [DiemController::class, 'saveDiem'])->name('diem.save');

    Route::get('/lophocphan', [LopHocPhanController::class, 'index'])->name('lophocphan.index');
    Route::get('/lophocphan/{lophoc_ID}/sinhvien', [LopHocPhanController::class, 'showSinhVien'])->name('lophocphan.sinhvien');
    Route::get('/lophocphan/{lophoc_ID}/baocao', [DiemController::class, 'showDiemSinhVien'])->name('diem.baocao');
    Route::get('/lophocphan/{lophoc_ID}/diemdanh', [DiemDanhController::class, 'index'])->name('diemdanh.index');
    Route::post('/lophocphan/{lophoc_ID}/diemdanh', [DiemDanhController::class, 'store'])->name('diemdanh.store');
});



//route cho sinh vien
Route::prefix('student')->name('student.')->middleware(['web', 'auth'])->group(function () {
    Route::get('lophocphan', [StudentController::class, 'index'])->name('lophocphan.index');
    Route::get('{sinhvien_ID}/chitietthongtin', [StudentController::class, 'chiTietThongTin'])->name('chitietthongtin');
    Route::get('diem/{lophoc_ID}/{sinhvien_ID}', [StudentController::class, 'showDiem'])->name('diem.show');
    Route::get('lichhoc', [StudentController::class, 'lichHoc'])->name('lichhoc.index'); // Đảm bảo route này đã được khai báo
});
