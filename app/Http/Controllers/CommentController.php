<?php

namespace App\Http\Controllers;

use App\Models\Post;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post, Request $request)
    {
        $data = $request->validate([
            'comment' => 'required|string',
        ]);


        $comment = auth()->user()->comments()->create($data + [
                'post_id' => $post->id
            ]);

//         return redirect()->route('post.index');
         return back();

    }


}
