<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
//        $posts = Post::query()
//            ->where('user_id', auth()->id())
//            ->get();

        $posts = auth()->user()->posts()->get();
        return view('user.post.index', compact('posts'));
    }

    public function all()
    {
        $posts = Post::query()
            ->with('user')
            ->get();

        return view('user.post.all', compact('posts'));
    }


    public function create()
    {
        $post = new Post();
        return view('user.post.create', compact('post'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);


        if ($request->has('image')) {

            $path = $request->image->store('uploads', 'public');
            $data['image'] = $path;
        }


//        $data['user_id'] = auth()->id();
//        $post = Post::create($data);

        // OR

        $post = auth()->user()->posts()->create($data);
        return redirect()->route('post.index');

    }


    public function show(Post $post)
    {
        $comments = Comment::query()
            ->with('user')
            ->where('post_id', $post->id)
            ->get();

        return view('user.post.show', compact('post', 'comments'));
    }


    public function edit(Post $post)
    {
        return view('user.post.edit', compact('post'));

    }


    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes',
        ]);


        if ($request->has('image')) {

            if ($post->image) {
                File::delete(public_path('storage/' . $post->image));
            }
            $path = $request->image->store('uploads', 'public');
            $data['image'] = $path;
        }


//        $data['user_id'] = auth()->id();
//        $post = Post::create($data);

        // OR

        $post = $post->update($data);
        return redirect()->route('post.index');
    }


    public function destroy(Post $post): RedirectResponse
    {

        if ($post->image) {
            File::delete(public_path('storage/' . $post->image));
        }

        $post->delete();
        return redirect()->route('post.index');
    }
}
