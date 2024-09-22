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
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User Page Route
Route::get('/', function () {
    return view('userpage.index');
})->name('userpage');

// Dashboard and Protected Routes with Timezone Middleware
Route::middleware(['auth', 'admin', 'timezone', 'log.error'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/polosan', [PolosanController::class, 'index'])->name('polosan');

        // Satuan CRUD routes
        Route::resource('/master/satuan', SatuanController::class)->names([
            'index' => 'satuan',
            'create' => 'satuan.create',
            'store' => 'satuan.store',
            'edit' => 'satuan.edit',
            'update' => 'satuan.update',
            'destroy' => 'satuan.destroy',
        ])->middleware('log.activity');

        // User CRUD routes
        Route::resource('/master/user', UserController::class)->names([
            'index' => 'user',
            'create' => 'user.create',
            'store' => 'user.store',
            'edit' => 'user.edit',
            'update' => 'user.update',
            'destroy' => 'user.destroy',
        ])->middleware('log.activity');

        route::resource('/master/jenis_user', JenisUserController::class)->names([    'index' => 'jenis_user',    'create' => 'jenis_user.create',    'store' => 'jenis_user.store',    'edit' => 'jenis_user.edit',    'update' => 'jenis_user.update',    'destroy' => 'jenis_user.destroy',])->middleware('log.activity');

        // Kecamatan Route
        Route::get('/master/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan')->middleware('log.activity');

        // Settings profile routes
        Route::get('/settings/profile', [DashboardController::class, 'indexsettingsprofile'])->name('profile')->middleware('log.activity');
        Route::put('/settings/profile/{user}', [DashboardController::class, 'updateprofile'])->name('profile.update')->middleware('log.activity');

        // User Activity Routes
        Route::get('/aktivitas/user', [UserActivityController::class, 'index'])->name('aktivitas');

        // Log activity on specific action
        Route::middleware(['log.activity'])->group(function () {
            Route::post('/some-action', [UserActivityController::class, 'someAction']);
        });

        // Error Application Activity Route
        Route::get('/aktivitas/error_aplikasi', [ErrorApplicationController::class, 'index'])->name('aktivitas.error');

        // Menu CRUD routes
        Route::resource('/master/menu', MenuController::class)->names([
            'index' => 'menu',
            'create' => 'menu.create',
            'store' => 'menu.store',
            'edit' => 'menu.edit',
            'update' => 'menu.update',
            'destroy' => 'menu.destroy',
        ])->middleware('log.activity');
        Route::get('/{menu}', [MenuController::class, 'showDynamicMenu'])->name('dynamic.menu');

        // Buku CRUD routes
        Route::resource('/master/buku', BukuController::class)->names([
            'index' => 'buku.index',
            'create' => 'buku.create',
            'store' => 'buku.store',
            'edit' => 'buku.edit',
            'update' => 'buku.update',
            'destroy' => 'buku.destroy',
        ])->middleware('log.activity');

        // KategoriBuku CRUD routes
        Route::resource('/master/kategori_buku', KategoriBukuController::class)->names([
            'index' => 'kategori_buku.index',
            'create' => 'kategori_buku.create',
            'store' => 'kategori_buku.store',
            'edit' => 'kategori_buku.edit',
            'update' => 'kategori_buku.update',
            'destroy' => 'kategori_buku.destroy',
        ])->middleware('log.activity');

        // Mahasiswa CRUD routes
        Route::resource('/master/mahasiswa', MahasiswaController::class)->names([
            'index' => 'mahasiswa.index',
            'create' => 'mahasiswa.create',
            'store' => 'mahasiswa.store',
            'edit' => 'mahasiswa.edit',
            'update' => 'mahasiswa.update',
            'destroy' => 'mahasiswa.destroy',
        ])->middleware('log.activity');
    });
});
