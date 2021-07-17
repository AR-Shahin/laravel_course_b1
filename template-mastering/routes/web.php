<?php

use App\Http\Controllers\CategoryController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layout.master');
});


Route::resource('category', CategoryController::class)->except(['destroy']);


Route::get('test', function () {

    return Product::count();
});
