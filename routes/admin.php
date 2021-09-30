<?php
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;










Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin-login-form');
    Route::post('login', [AdminAuthController::class, 'doLogin'])->name('admin-login-form-submit');


    Route::middleware('auth:admin')->group(function () {
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin-logout');

        //Admin Dashboard Routes
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin-dashboard');
        Route::get('welcome', [AdminController::class, 'welcome'])->name('admin-welcome');
    });
});
