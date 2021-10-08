<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post, User $user, Request $request): RedirectResponse
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
