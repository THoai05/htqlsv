<?php

use Illuminate\Support\Facades\Route;

// Import controller ở đầu file
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\LichHocController;
use App\Http\Controllers\UsersController;

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
