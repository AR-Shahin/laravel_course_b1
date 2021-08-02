<?php

use App\Http\Controllers\CategoryController;
use App\Models\Product;
use App\Scopes\ViewScope;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layout.master');
});


Route::resource('category', CategoryController::class);



// Route::resource('post', CategoryController::class)->except(['destroy']);



// Route::get('test', function () {

//     return Product::count();
// });


// Route::get('scope', function () {
//     // return Product::withoutGlobalScope(ViewScope::class)->get()->count();
//     // return Product::withoutGlobalScopes(['lessThanFifty', 'another'])->get()->count();

//     // return Product::Active()->orWhere->Popular()->get()->count();


//     return Product::DynamicStatus()->get()->count();
// });
