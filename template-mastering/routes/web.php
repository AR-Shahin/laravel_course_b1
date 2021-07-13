<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layout.master');
});


Route::resource('category', CategoryController::class)->except(['destroy']);
