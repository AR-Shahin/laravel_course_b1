<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    PostController,
    HomeController,
    SocialLoginController,
    UserController
};
use App\Mail\SocialNewUserMail;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\User;


// Route::get('/mail', function () {
//     $user = User::first();
//     return new SocialNewUserMail($user);
// });

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

Route::get('user-comments', [UserController::class, 'userPostComments'])->name('user-all-comments');


# Social Login
Route::get('/auth/redirect/{provider}', [SocialLoginController::class, 'login'])->name(('social.login'));
Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('social.callback');


// Route::get('search-post/{query}', function ($query) {

//     return Post::withOnly('author')->where('name', 'like', "%$query%")->get(['name', 'slug', 'author_id']);
// });


Route::get('search-post/{query}', [PostController::class, 'dynamicSearch'])->name('dynamic-search');

Route::post('subscriber', function (Request $request) {

    $request->validate([
        'email' => ['required', 'unique:subscribers,email']
    ]);
    Subscriber::create([
        'email' => $request->email
    ]);
});
