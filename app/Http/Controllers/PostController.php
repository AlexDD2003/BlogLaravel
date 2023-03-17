<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::all();

    return view('post', compact('posts'));
}

public function store(Request $request)
{
    $post = new Post;
    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();

    return redirect()->route('posts.index');
}

public function show(Post $post)
{
    return view('show', compact('post'));
}


public function destroy(Post $post)
{
    $post->delete();
    return redirect()->route('posts.index');
}



}
