<?php

namespace App\Http\Controllers\API;

use App\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags', 'category', 'user'])->paginate(9);

        return $posts;
    }

    public function show($slug)
    {
        $post = Post::with(['tags', 'category', 'user'])->where('slug', $slug)->first();
        if ($post) {
            return $post;
        } else {
            return response()->json([
                'status_code' => 404,
                'status_text' => 'not found'
            ]);
            //ddd($post);
        }
    }
}