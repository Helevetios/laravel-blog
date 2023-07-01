<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('blog.home');

Route::get('register', function () {
    return view('auth.register');
})->name('register.view');

Route::get('login', function () {
    return view('auth.login');
})->name('login.view');

Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'verifAdmin'])->group(function () {
    Route::get('admin', function () {
        return view('admin.admin');
    })->name('admin.view');

    Route::get('admin/categories/add', function () {
        return view('admin.add_category');
    })->name('categories.add.view');

    Route::get('admin/categories', [CategoryController::class, 'category'])->name('categories.view');

    Route::post('admin/categories/store', [CategoryController::class, 'categoryStore'])->name('categoryStore');

    Route::delete('admin/categories/delete/{id}', [CategoryController::class, 'categoryDestroy'])->name('categoryDestroy');

    Route::get('admin/categories/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('categoryUpdate');

    Route::post('admin/category/update/{id}', [CategoryController::class, 'update'])->name('updateCategory');

    Route::get('admin/posts', [PostController::class, 'posts'])->name('posts.view');

    Route::get('admin/posts/add', [PostController::class, 'add'])->name('add.post');

    Route::post('admin/posts/store', [PostController::class, 'addStore'])->name('addStore');

    Route::delete('admin/posts/delete/{id}', [PostController::class, 'postDelete'])->name('postDelete');

    Route::get('admin/posts/edit/{id}', [PostController::class, 'postEdit'])->name('postEdit');

    Route::post('admin/posts/update/{id}', [PostController::class, 'edit'])->name('edit.post');
});

Route::get('categories', [HomeController::class, 'categories'])->name('categories');

Route::get('post/{id}', [HomeController::class, 'postView'])->name('postView');

Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('posts.like');

Route::delete('/posts/{post}/unlike', [LikeController::class, 'unlike'])->name('posts.unlike');

Route::get('user/likes', [HomeController::class, 'likes'])->name('likes');

Route::get('categories/{id}/posts', [HomeController::class, 'showPosts'])->name('showPosts');

Route::get('search',[HomeController::class, 'search'])->name('search');