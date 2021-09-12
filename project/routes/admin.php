<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {

    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('fetch-category', [CategoryController::class, 'fetchCategory'])->name('fetch-category');
});