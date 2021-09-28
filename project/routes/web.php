<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('all-posts', [PostController::class, 'allPost'])->name('all-post');
Route::get('/single-post/{slug}', [PostController::class, 'showSinglePost'])->name('single-post');
Route::get('/category-post/{slug}', [PostController::class, 'categoryWisePosts'])->name('category-post');
Route::get('/tag-post/{id}', [PostController::class, 'tagWisePosts'])->name('tags-post');
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/admin_auth.php';

Route::get('test', function () {
    return view('Backend.Category.test');
});
