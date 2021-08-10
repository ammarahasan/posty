<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        // dd($request->body);
        $messages = array(
            'body.required' => 'حقل نص المنشور مطلوب',
        );

        $this->validate($request, [
            'body' => 'required'
        ], $messages);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        return back();
    }
}
