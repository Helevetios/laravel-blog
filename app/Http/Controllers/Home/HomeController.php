<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $categories = DB::table('categories')->limit(6)->get();
        $recents = DB::table('posts')->orderBy('id', 'desc')->limit(3)->get();
        $populars = DB::table('posts')->orderBy('likes', 'desc')->limit(3)->get();
        return view('blog.home', compact('categories', 'recents', 'populars'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('blog.categories', compact('categories'));
    }

    public function postView($id)
    {
        $post = Post::find($id);
        $title = $post->name;
        return view('blog.post', compact('post', 'title'));
    }

    public function likes()
    {
        $likes = Like::where('user_id', auth()->user()->id)->get();
        return view('blog.likes', compact('likes'));
    }
}
