<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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
}
