<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Notifications\TestEnrollment;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class UserAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function login()
    {
        return view('admin.auth.a_user_login');
    }


    public function register()
    {
        return view('auth.register');
    }

    public function doLogin(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('post.index');

        } else {
            return 'login failed';
        }

    }


    public function doRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $enrollmentData = [
            'body' => 'You are received a new test notification',
            'enrollmentText' => 'You are allowed to enroll',
            'url' => url('http://127.0.0.1:8000/user/home'),
            'thankyou' => 'You are 14 days to enroll'
        ];


        $user = User::create($data);

        $user->notify(new TestEnrollment($enrollmentData));

        return $user;
        //return redirect()->route('register-form')->with('status', $user->name . ' Registered Successfully');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login-form');

    }

}
