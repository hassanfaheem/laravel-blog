<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', ['posts' => Post::latest()->with('user')->paginate(10)]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'body' => 'required|string|max:255',
        ]);

        $post = Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.show', $post)->withFragment('comments');
    }

    public function show(Post $post)
    {
        return response(view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->latest()->with('user')->paginate(5),
        ]));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->validate([
            'title' => 'required|string|max:100',
            'body' => 'required|string|max:255',
        ]);

        $post->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.show', $post)->withFragment('comments');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
