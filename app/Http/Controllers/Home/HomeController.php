<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
}
