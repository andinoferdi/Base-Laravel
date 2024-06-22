<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserActivityController;
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
Route::middleware(['auth', 'admin', 'timezone'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/master/satuan', SatuanController::class)->names([
            'index' => 'satuan',
            'create' => 'satuan.create',
            'store' => 'satuan.store',
            'edit' => 'satuan.edit',
            'update' => 'satuan.update',
            'destroy' => 'satuan.destroy',
        ])->middleware('log.activity');

        Route::resource('/master/user', UserController::class)->names([
            'index' => 'user',
            'create' => 'user.create',
            'store' => 'user.store',
            'edit' => 'user.edit',
            'update' => 'user.update',
            'destroy' => 'user.destroy',
        ])->middleware('log.activity');

        Route::get('/master/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan')->middleware('log.activity');

        Route::get('/settings/profile', [DashboardController::class, 'indexsettingsprofile'])->name('profile')->middleware('log.activity');
        Route::put('/settings/profile/{user}', [DashboardController::class, 'updateprofile'])->name('profile.update')->middleware('log.activity');

        // Route untuk menampilkan aktivitas pengguna
        Route::get('/aktivitas/user', [UserActivityController::class, 'index'])->name('aktivitas');

        // Route untuk mencatat aktivitas pengguna dengan middleware log.activity
        Route::middleware(['log.activity'])->group(function () {
            Route::post('/some-action', [UserActivityController::class, 'someAction']);
        });
    });
});

