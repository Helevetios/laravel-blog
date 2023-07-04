<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function posts()
    {
        $posts = Post::paginate(9);
        return view('admin.posts', compact('posts'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.add_post', compact('categories'));
    }

    public function addStore(AddRequest $request)
    {
        $post = new Post();

        $post->name = $request->name;
        $post->image = $request->file('image')->store('posts', 'public');
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();

        return redirect()->to('admin/posts');
    }

    public function postDelete($id)
    {
        $post = Post::find($id);

        if (Storage::delete('public/' . $post->image)) {
            Post::destroy($id);
        }
        return redirect()->back();
    }

    public function postEdit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.edit_post', compact('post', 'categories'));
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        $post->name = $request->name;

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $post->image);
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->body = $request->body;

        $post->save();

        return redirect()->to('admin/posts');
    }
}
