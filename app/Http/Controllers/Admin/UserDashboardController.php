<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.au_dashboard');
    }

    public function view_user()
    {
        $user = User::all();
        return view('admin.user.show_user', compact('user'));
    }
}
