<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showAllPost(Request $request): JsonResponse
    {
        $posts = Post::query()
            ->simplePaginate();

        return response()->json($posts, 200, [], JSON_PRETTY_PRINT);
    }

    public function fetchPost(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => 'required'
        ]);

        $posts = Post::query()
            ->with(['user','comments'])
            ->findOrFail($data['id']);

        return response()->json($posts, 200, [], JSON_PRETTY_PRINT);
    }

    public function updatePost(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
        ]);

        $post = Post::findOrFail($data['id']);
        $post->update([
            'name' => $data['name']
        ]);

        return response()->json($post, 200, [], JSON_PRETTY_PRINT);
    }
}
