<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(5);
        return view('admin.categories', compact('categories'));
    }

    public function categoryStore(CategoryRequest $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->image = $request->file('image')->store('categories', 'public');

        $category->save();

        return redirect()->to('admin/categories');
    }

    public function categoryDestroy($id)
    {
        $category = Category::find($id);

        if (Storage::delete('public/' . $category->image)) {
            Category::destroy($id);
        }
        return redirect()->back();
    }

    public function categoryUpdate($id)
    {
        $category = Category::find($id);
        return view('admin.update_category', compact('category'));
    }

    public function update(Request  $request, $id)
    {
        $category = Category::find($id);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $category->image);
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->to('admin/categories');
    }
}
