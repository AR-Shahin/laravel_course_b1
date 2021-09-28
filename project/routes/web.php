<?php

use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/show-post/{slug}', [PostController::class, 'showSinglePost'])->name('single-post');



Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/admin_auth.php';

Route::get('test', function () {
    return view('Backend.Category.test');
});
