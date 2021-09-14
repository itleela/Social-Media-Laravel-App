<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function login()
    {
        return view('auth.login');
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

        $user = User::create($data);

        return redirect()->route('register-form')->with('status', $user->name . ' Registered Successfully');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login-form');

    }
}
