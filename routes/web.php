<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\SinhvienController;

Route::resource('sinhvien', SinhvienController::class);


use App\Http\Controllers\GiangVienController;

Route::resource('giangviens', GiangVienController::class);

use App\Http\Controllers\MonHocController;

Route::resource('monhocs', MonHocController::class);

use App\Http\Controllers\LichHocController;

Route::get('lichhoc', [LichHocController::class, 'index'])->name('lichhoc.index');
Route::get('lichhoc/create', [LichHocController::class, 'create'])->name('lichhoc.create');
Route::post('lichhoc', [LichHocController::class, 'store'])->name('lichhoc.store');
Route::get('lichhoc/{lophoc_ID}/edit', [LichHocController::class, 'edit'])->name('lichhoc.edit');
Route::put('lichhoc/{lophoc_ID}', [LichHocController::class, 'update'])->name('lichhoc.update');
Route::delete('lichhoc/{lophoc_ID}', [LichHocController::class, 'destroy'])->name('lichhoc.destroy');

use App\Http\Controllers\UsersController;

Route::get('/users', [UsersController::class, 'index'])->name('users.index'); // Danh sách user
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create'); // Form thêm user
Route::post('/users', [UsersController::class, 'store'])->name('users.store'); // Lưu user mới

Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit'); // Form sửa user
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update'); // Cập nhật user

Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy'); // Xóa user

