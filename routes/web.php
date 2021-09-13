<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [UserAuthController::class, 'login'])->name('login-form');

Route::get('/register', [UserAuthController::class, 'register'])->name('register-form');


Route::post('/login', [UserAuthController::class, 'doLogin'])->name('login-form-submit');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');


Route::post('/register', [UserAuthController::class, 'doRegister'])->name('register-form-submit');
Route::get('user/welcome', [UserController::class, 'welcome'])->name('user-welcome')->middleware('auth');


// Admin Login Routes ::::

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin-login-form');
Route::post('admin/login', [AdminAuthController::class, 'doLogin'])->name('admin-login-form-submit');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin-logout');

Route::get('admin/welcome', [AdminController::class, 'welcome'])->name('admin-welcome')->middleware('auth:admin');
