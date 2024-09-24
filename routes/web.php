<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PolosanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\ErrorApplicationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingMenuController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('userpage.index');
})->name('userpage');

Route::middleware(['auth', 'admin', 'timezone', 'log.error', 'check.menu.access'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/polosan', [PolosanController::class, 'index'])->name('polosan');
        Route::resource('satuan', SatuanController::class)->middleware('log.activity');
        Route::resource('user', UserController::class)->middleware('log.activity');
        Route::resource('jenis_user', JenisUserController::class)->middleware('log.activity');
        Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan')->middleware('log.activity');
        Route::get('settings/profile', [DashboardController::class, 'indexsettingsprofile'])->name('profile')->middleware('log.activity');
        Route::put('settings/profile/{user}', [DashboardController::class, 'updateprofile'])->name('profile.update')->middleware('log.activity');
        Route::get('aktivitas/user', [UserActivityController::class, 'index'])->name('aktivitas');
        Route::get('aktivitas/error_aplikasi', [ErrorApplicationController::class, 'index'])->name('aktivitas.error');
        Route::resource('menu', MenuController::class)->middleware('log.activity');
        Route::resource('setting_menus', SettingMenuController::class)->middleware('log.activity');
        Route::resource('buku', BukuController::class)->middleware('log.activity');
        Route::resource('kategori_buku', KategoriBukuController::class)->middleware('log.activity');
        Route::resource('mahasiswa', MahasiswaController::class)->middleware('log.activity');
    });
});
