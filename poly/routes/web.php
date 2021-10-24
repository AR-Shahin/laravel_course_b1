<?php

use App\Models\Tag;
use App\Models\Info;
use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    // $admin = Admin::create([
    //     'name' => "admin two",
    //     'email' => "a12@mail.com",
    //     'password' => bcrypt(123)
    // ]);
    // $admin->info()->create([
    //     'address' => 'Chandpur'
    // ]);

    // return Admin::with('info')->find(2);

    // return $info = Info::find(1)->subject->getTable();
    // dd($info);

    // $post = Product::create([
    //     'name' => 'Post 3'
    // ]);
    // for ($i = 1; $i <= 3; $i++) {
    //     $post->comments()->create([
    //         'title' => "Comment  Product $i"
    //     ]);
    // }

    // return Product::with('oldestComment')->find(1);


    // return Comment::find(8)->subject->getTable();




    # post => admin_id
    # post ->admin->info


    # many to many polymorphic

    // $post = Product::create([
    //     'name' => 'Product 2'
    // ]);

    // $post->tags()->attach([1, 4]);
    // return $post;

    // $post = Product::with('tags:name')->find(1);
    // return $post;

    // return Tag::with('products:name')->find(1);

    App::setLocale('bn');
    return view('welcome');
});
