<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    // $users = User::without(['role', 'posts'])->get();
    // $users = User::withOnly('profile')->get();

    // $users = User::has('profile')->with('profile')->get();

    // $users = User::whereHas('profile', function ($query) {
    //     $query->whereNull('post_code');
    // })->with('profile')->get();

    // $users = User::whereHas('profile', function ($query) {
    //     $query->whereNotNull('post_code');
    // })->with('profile')->get();

    // $users = User::whereHas('profile', function ($query) {
    //     $query->where('post_code', '>', 50);
    // })->with('profile')->get();


    // $users = User::doesntHave('profile')->with('profile')->get();

    $users = User::whereHas('profile')->with('profile')->get();

    // User::find(4)->profile()->create([
    //     'phone' => 123456966666,
    //     'post_code' => 789,
    //     'address' => "Dhaka"
    // ]);
    return view('welcome', compact('users'));
});



// Has many relationship

Route::get('has-many', function () {

    //single model
    // return Post::find(10)->user;
    // $users = User::whereDoesntHave('posts')->get();
    // $users->load('posts');

    // $user = User::find(5)->posts()->create([
    //     'title' => 'This is our custom title'
    // ]);
    // return $user;

    // return  Post::create([
    //     'title' => 'ssss',
    //     'user_id' => 5
    // ]);

    // return User::find(2)->oldestPost;
    // return User::find(5)->oldestPost;
    return view('has-many', compact('users'));
});
