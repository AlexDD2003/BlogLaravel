<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::all();

    return view('index', compact('posts'));
}

public function store(Request $request)
{
    $post = new Post;
    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();

    return redirect()->route('home');
}

public function show(Post $post)
{
    return view('show', compact('post'));
}


}
