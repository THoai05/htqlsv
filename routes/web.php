<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\SinhvienController;

Route::resource('sinhvien', SinhvienController::class);






use App\Http\Controllers\LichHocController;

Route::get('lichhoc', [LichHocController::class, 'index'])->name('lichhoc.index');
Route::get('lichhoc/create', [LichHocController::class, 'create'])->name('lichhoc.create');
Route::post('lichhoc', [LichHocController::class, 'store'])->name('lichhoc.store');
Route::get('lichhoc/{lophoc_ID}/edit', [LichHocController::class, 'edit'])->name('lichhoc.edit');
Route::put('lichhoc/{lophoc_ID}', [LichHocController::class, 'update'])->name('lichhoc.update');
Route::delete('lichhoc/{lophoc_ID}', [LichHocController::class, 'destroy'])->name('lichhoc.destroy');
