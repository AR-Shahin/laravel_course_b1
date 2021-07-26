<?php

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
