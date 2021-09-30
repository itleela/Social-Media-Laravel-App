<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function send_Password_link()
    {
        return view('auth.passwords.email');
    }
    public  function password_reset()
    {
        return view('auth.passwords.reset');
    }
    public function confirm()
    {
        return view('auth.passwords.confirm');
    }
}
