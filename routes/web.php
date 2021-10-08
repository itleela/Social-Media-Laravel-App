<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\post\CommentController;
use App\Http\Controllers\Admin\AdminUserAuthController;
use App\Http\Controllers\Admin\UserDashboardController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\UserAuthController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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

    //Admin Route as User---------------!
    Route::get('admin/login', [AdminUserAuthController::class, 'AdminUserLogin'])->name('admin-user-login');
    Route::post('admin/login', [AdminUserAuthController::class, 'AdminUserDoLogin'])->name('admin-user');

    //Admin Route as User End-----------!


    Route::get('/login', [UserAuthController::class, 'login'])->name('login-form');

    Route::get('/register', [UserAuthController::class, 'register'])->name('register-form');

    Route::post('/login', [UserAuthController::class, 'doLogin'])->name('login-form-submit');

    Route::post('/register', [UserAuthController::class, 'doRegister'])->name('register-form-submit');

    //Route for a mailing
    Route::get('/email', function () {
        Mail::to('rathvaleela4@gmail.com')->send(new WelcomeMail());
        return new WelcomeMail();
    });

    Route::get('/send-testenrollment', [TestController::class, 'sendTestNotification']);


    Route::get('/password_reset', [ForgotPasswordController::class, 'password_reset'])->name('password_reset-form');
    Route::get('/send_link', [ForgotPasswordController::class, 'send_Password_link'])->name('send_link-form');
    Route::get('/password_confirm', [ForgotPasswordController::class, 'confirm'])->name('password_confirm-form');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('post/all', [PostController::class, 'all'])->name('post.all');

    });

    Route::middleware('auth')->group(function () {
        //Admin Route as User---------------!
        Route::get('admin/dashboard', [UserDashboardController::class, 'dashboard'])->name('user-dashboard');
        /*Route::get('admin/post/create', [AdminUserPostController::class, 'create'])->name('post_create');
        Route::post('admin/post/create', [AdminUserPostController::class, 'store'])->name('post_store');
        Route::get('admin/all_post', [AdminUserPostController::class, 'all'])->name('all-post');

        Route::get('admin/post', [AdminUserPostController::class, 'index'])->name('my_post');
        Route::get('admin/Show_post/{post}', [AdminUserPostController::class, 'show'])->name('show_post');
        Route::get('admin/edit', [AdminUserPostController::class, 'edit'])->name('edit_post');
        Route::post('admin/edit', [AdminUserPostController::class, 'update'])->name('update_post');*/
        Route::get('logout-admin', [AdminUserAuthController::class, 'logout'])->name('logout-admin');
        //Admin Route as User End---------------!


        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');

        Route::get('/home', [HomeController::class, 'index'])->name('home');
//      Route::resource('post', PostController::class)->except(['show', 'index']);




        Route::resource('post', PostController::class);

        Route::post('{post}/comment', [CommentController::class, 'store'])->name('comment.store');


    });


});


// Admin Login Routes ::::



