<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout']);
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth('admin')->attempt($data)) {
            return redirect()->route('admin-dashboard');
        } else {
            return 'login failed';
        }

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth('admin')->logout();
        return redirect()->route('admin-login-form');
    }
}
