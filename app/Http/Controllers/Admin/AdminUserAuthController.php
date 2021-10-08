<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserAuthController extends Controller
{
    public function AdminUserLogin()
    {
        return view('admin.auth.a_user_login');
    }

    public function AdminUserDoLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            return redirect(route('user-dashboard'));

        } else {
            return redirect(route('admin-user-login'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route('admin-user-login'));

    }


}
