<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\HomeController;
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


Route::get('/', function () {
    return 'Routes Changed';
});


Route::prefix('user')->group(function () {


    Route::get('/login', [UserAuthController::class, 'login'])->name('login-form');

    Route::get('/register', [UserAuthController::class, 'register'])->name('register-form');

    Route::post('/login', [UserAuthController::class, 'doLogin'])->name('login-form-submit');

    Route::post('/register', [UserAuthController::class, 'doRegister'])->name('register-form-submit');


    Route::middleware('auth')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');
        Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::resource('post', PostController::class)->except(['show', 'index']);

        Route::get('post/all', [PostController::class, 'all'])->name('post.all');
        Route::resource('post', PostController::class);

        Route::post('{post}/comment', [CommentController::class, 'store'])->name('comment.store');



    });


});


// Admin Login Routes ::::


Route::prefix('admin')->group(function () {

    Route::get('/', [AdminAuthController::class, 'login'])->name('admin-login-form');
    Route::post('login', [AdminAuthController::class, 'doLogin'])->name('admin-login-form-submit');


    Route::middleware('auth:admin')->group(function () {
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin-logout');
        Route::get('welcome', [AdminController::class, 'welcome'])->name('admin-welcome');
    });
});
