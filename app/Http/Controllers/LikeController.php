<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $post->likes()->create([
            'user_id' => auth()->user()->id,
        ]);
        $post = Post::findOrFail($post->id);
        $post->increment('likes');
        return back();
    }

    public function unlike(Post $post)
    {
        $post->likes()->where('user_id', auth()->user()->id)->delete();
        $post = Post::findOrFail($post->id);
        $post->decrement('likes');
        return back();
    }
}
