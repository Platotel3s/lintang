<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MuspinController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\UptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/testing', function () {
    return view('test');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('login/page', 'loginPage')->name('loginPage');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'role:muspin'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/register/page', 'regisPage')->name('regisPage');
        Route::post('/register', 'register')->name('register');
    });
    Route::controller(MuspinController::class)->group(function () {
        Route::get('/dashboard/muspin', 'dashboard')->name('dashboard.muspin');
        Route::post('/tambah/upt', 'insertUpt')->name('insert.upt');
        Route::get('/tambah/upt', 'tambahUpt')->name('tambah.upt');
        Route::patch('/upt/{id}/update', 'updateUpt')->name('update.upt');
        Route::get('/get/{id}/upt', 'editUptPage')->name('edit.upt');
        Route::delete('/hapus/{id}/upt', 'hapusUpt')->name('hapus.upt');
        Route::get('/daftar/upt', 'listUpt')->name('list.upt');
        Route::get('/index/jenis/laporan', 'daftarJenisLaporan')->name('index.jenisLaporan');
        Route::get('/tambah/jenis/laporan', 'createJenisLaporan')->name('create.jenisLaporan');
        Route::post('/store/jenis/laporan', 'storeJenisLaporan')->name('store.jenisLaporan');
        Route::get('/jenisLaporan/{id}/edit', 'editJenisLaporan')->name('edit.jenisLaporan');
        Route::patch('/jenisLaporan/{id}/update', 'updateJenisLaporan')->name('update.jenisLaporan');
        Route::delete('/jenisLaporan/{id}/delete', 'hapusJenisLaporan')->name('delete.jenisLaporan');
    });
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/verifikasi-laporan', 'index')->name('verifikasi.laporan');
        Route::post('laporan/{id}/status', 'updateStatus')->name('laporan.updateStatus');
        Route::get('/verifikasi-laporan', 'verifikasiIndex')->name('muspin.verifikasi.index');
        Route::post('/verifikasi-laporan/{id}', 'verifikasiUpdate')->name('muspin.verifikasi.update');
    });
    Route::controller(PeriodeController::class)->group(function () {
        Route::get('/periode/index', 'index')->name('index.periode');
        Route::get('/periode/create', 'create')->name('create.periode');
        Route::post('/periode/store', 'store')->name('store.periode');
        Route::get('/periode/{id}/edit', 'edit')->name('edit.periode');
        Route::patch('/periode/{id}/update', 'update')->name('update.periode');
        Route::delete('/periode/{id}/delete', 'destroy')->name('delete.periode');
    });
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
