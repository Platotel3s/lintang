<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MuspinController;
use App\Http\Controllers\UptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/testing', function () {
    return view('test');
});
Route::get('/register/page', [AuthController::class, 'regisPage'])->name('regisPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('login/page', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:muspin'])->group(function () {
    Route::get('/dashboard/muspin', [MuspinController::class, 'dashboard'])->name('dashboard.muspin');
    Route::post('/tambah/upt', [MuspinController::class, 'insertUpt'])->name('insert.upt');
    Route::get('/tambah/upt', [MuspinController::class, 'tambahUpt'])->name('tambah.upt');
    Route::patch('/upt/{id}/update', [MuspinController::class, 'updateUpt'])->name('update.upt');
    Route::get('/get/{id}/upt', [MuspinController::class, 'editUptPage'])->name('edit.upt');
    Route::delete('/hapus/{id}/upt', [MuspinController::class, 'hapusUpt'])->name('hapus.upt');
    Route::get('/daftar/upt', [MuspinController::class, 'listUpt'])->name('list.upt');
    Route::get('/index/jenis/laporan', [MuspinController::class, 'daftarJenisLaporan'])->name('index.jenisLaporan');
    Route::get('/tambah/jenis/laporan', [MuspinController::class, 'createJenisLaporan'])->name('create.jenisLaporan');
    Route::post('/store/jenis/laporan', [MuspinController::class, 'storeJenisLaporan'])->name('store.jenisLaporan');
    Route::get('/jenisLaporan/{id}/edit', [MuspinController::class, 'editJenisLaporan'])->name('edit.jenisLaporan');
    Route::patch('/jenisLaporan/{id}/update', [MuspinController::class, 'updateJenisLaporan'])->name('update.jenisLaporan');
    Route::delete('/jenisLaporan/{id}/delete', [MuspinController::class, 'hapusJenisLaporan'])->name('delete.jenisLaporan');
    Route::get('/verifikasi-laporan', [LaporanController::class, 'index'])->name('verifikasi.laporan');
    Route::post('/laporan/{id}/status', [LaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
    Route::get('/verifikasi-laporan', [LaporanController::class, 'verifikasiIndex'])->name('muspin.verifikasi.index');
    Route::post('/verifikasi-laporan/{id}', [LaporanController::class, 'verifikasiUpdate'])->name('muspin.verifikasi.update');
});
Route::middleware(['auth', 'role:upt'])->group(function () {
    Route::get('/dashboard/upt', [UptController::class, 'dashboard'])->name('dashboard.upt');
    Route::get('/laporan/index', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/update/profile', function () {
        return view('components.updateProfile');
    })->name('updateProfilePage');
    Route::post('/update/profile', [AuthController::class, 'updateProfil'])->name('updateProfil');
    Route::get('/update/password', function () {
        return view('components.updatePassword');
    })->name('updatePasswordPage');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::post('/update/password', [AuthController::class, 'updatePassword'])->name('updatePassword');
});
Route::view('/not-found', 'errors.404')->name('notfound');
Route::view('/unauthorized', 'errors.403')->name('unauthorized');
