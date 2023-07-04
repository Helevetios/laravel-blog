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
        $recents = DB::table('posts')->orderBy('id', 'desc')->limit(3)->get();
        return view('blog.post', compact('post', 'title', 'recents'));
    }

    public function likes()
    {
        $likes = Like::where('user_id', auth()->user()->id)->paginate(12);
        return view('blog.likes', compact('likes'));
    }

    public function showPosts($id)
    {
        $posts = Post::where('category_id', $id)->get();
        $categoryName = Category::find($id);
        return view('blog.categoriesPosts', compact('posts', 'categoryName'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);
        $searchs = DB::table('posts')->where('name', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->get();
        return view('blog.search', compact('searchs'));
    }
}
