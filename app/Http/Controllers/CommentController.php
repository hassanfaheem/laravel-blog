<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $data = $request->validate(['body' => 'required|string|max:255',]);
        $post->comments()->create([
            'body' => $data['body'],
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.show', $post)->withFragment('comments');
    }

    public function destroy(Post $post, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('posts.show', $post)->withFragment('comments');
    }
}
