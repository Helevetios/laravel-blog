<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
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
});
