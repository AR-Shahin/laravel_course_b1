<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    PostController,
    HomeController
};




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('all-posts', [PostController::class, 'allPost'])->name('all-post');
Route::get('/single-post/{slug}', [PostController::class, 'showSinglePost'])->name('single-post');
Route::get('/category-post/{slug}', [PostController::class, 'categoryWisePosts'])->name('category-post');
Route::get('/tag-post/{slug}', [PostController::class, 'tagWisePosts'])->name('tags-post');
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/admin_auth.php';

require __DIR__ . '/user_auth.php';
Route::get('test', function () {
    return view('layouts.frontend_master');
});

# Comment

Route::post('post-comments/{post}', [PostController::class, 'storePostComment'])->name('post.comment')->middleware(['auth:user']);
