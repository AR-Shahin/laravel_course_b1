<?php

use App\Models\Admin;
use App\Models\Info;
use App\Models\User;
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

    return Admin::with('info')->find(2);

    return $info = Info::find(2)->subject;
    // dd($info);
    return view('welcome');
});
