<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User Page Route
Route::get('/', function () {
    return view('userpage.index');
});

// Dashboard and Protected Routes with Timezone Middleware
Route::middleware(['auth', 'verified', 'admin', 'timezone'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/dashboard/master/satuan', SatuanController::class)->names([
        'index' => 'satuan',
        'create' => 'satuan.create',
        'store' => 'satuan.store',
        'edit' => 'satuan.edit',
        'update' => 'satuan.update',
        'destroy' => 'satuan.destroy',
    ]);
Route::resource('/dashboard/master/user', UserController::class)->middleware(['auth', 'verified', 'admin'])->names([
    'index' => 'user',
    'create' => 'user.create',
    'store' => 'user.store',
    'edit' => 'user.edit',
    'update' => 'user.update',
    'destroy' => 'user.destroy', // tambahkan ini
]);

    Route::get('/dashboard/master/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
});
