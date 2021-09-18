<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {

    // Route::get('category', [CategoryController::class, 'index'])->name('category.index');

    Route::resource('category', CategoryController::class)->except(['create', 'edit']);
    Route::get('fetch-category', [CategoryController::class, 'fetchCategory'])->name('fetch-category');

    Route::get('fetch-sub-category', [SubCategoryController::class, 'fetchSubCategory'])->name('fetch-sub-category');
    Route::resource('sub-category', SubCategoryController::class)->except(['create', 'edit']);
});
