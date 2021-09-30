<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function welcome()
    {
//        return view('admin.layouts.admin-master');
        return view('admin.dashboard.dashboard');
    }
}
