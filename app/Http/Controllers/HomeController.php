<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Post $post)
    {

        $post = Post::all();
        return view('Home.index',compact('post'));
    }
}
