<?php

use App\Models\Country;
use App\Models\Machanic;
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

    //User::find(2)->oldestPost;
    // return User::find(5)->oldestPost;
    return view('has-many', compact('users'));
});


// Has one through

Route::get('has-one-through', function () {
    $machanics = Machanic::with('car', 'owner')->get();
    return view('has-one-through', compact('machanics'));
});



// Has many through

Route::get('has-many-through', function () {
    $countries = Country::with('cities.shops')->get();
    return view('has-many-through', compact('countries'));
});


# many to many

Route::get('many-to-many', function () {

    # add data
    //return User::find(1)->skills()->attach([2, 5]);

    # add data with extra attributes
    // return User::find(1)->skills()->attach(
    //     [
    //         3 => ['view' => 530],
    //         4 => ['view' => 150],
    //     ]

    // );


    # delete single
    // return User::find(1)->skills()->detach(2);

    # delete multiple
    // return User::find(2)->skills()->detach([3, 4]);


    # Sync -> jeta thake oita rakhe baki ghula delete r new asle add kore
    // return User::find(2)->skills()->sync([1, 2, 4, 5]);

    // return User::find(5)->skills()->sync([5 => ['view' => 159], 2, 1 => ['view' => 963]]);


    # Toggle -> jeta thake na oita add kore baki ghula delete kore and new add kore na
    // return User::find(5)->skills()->toggle([1,  5]);


    # fetch

    return $users = User::has('skills')->with('skills')->get();
    return view('many-to-many', compact('users'));
});


Route::get('abc', function () {
    return view('abc');
});
Route::get('1st', function () {
    return view('test.1st');
});
Route::get('2nd', function () {
    return view('test.2nd');
})->name('2nd');

Route::get('3rd/{id}/{another}', function () {
    return view('test.3rd');
})->name('3rd');
