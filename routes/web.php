<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('index-mahasiswa');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('create-mahasiswa');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('store-mahasiswa');
Route::get('/mahasiswa/{npm}/edit', [MahasiswaController::class, 'edit'])->name('edit-mahasiswa');
Route::delete('/mahasiswa/{npm}', [MahasiswaController::class, 'destroy'])->name('destroy-mahasiswa');
Route::get('/mahasiswa/export/excel', [MahasiswaController::class, 'exportExcel'])->name('export-mahasiswa');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
