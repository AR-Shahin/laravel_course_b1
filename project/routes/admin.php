<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    PostController,
    CategoryController,
    SliderController,
    SubCategoryController,
    TagController,
    WebsiteController
};
use App\Mail\DemoMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

// use App\Http\Controllers\Admin\;
// use App\Http\Controllers\Admin\;
// use App\Http\Controllers\Admin\;
// use App\Http\Controllers\Admin\;
// use App\Http\Controllers\Admin\;

Route::prefix('admin')->as('admin.')->group(function () {

    // Route::get('category', [CategoryController::class, 'index'])->name('category.index');

    Route::resource('category', CategoryController::class)->except(['create', 'edit']);
    Route::get('fetch-category', [CategoryController::class, 'fetchCategory'])->name('fetch-category');

    Route::resource('sub-category', SubCategoryController::class)->except(['create', 'edit']);

    Route::get('fetch-sub-category', [SubCategoryController::class, 'fetchSubCategory'])->name('fetch-sub-category');
    // Post

    Route::resource('post', PostController::class);
    Route::get('get-sub-category-by-category/{id}', [PostController::class, 'getSubCategoryByCategory'])->name('get-sub-cat-by-cat');
    Route::get('check-post-exists-or-not/{id}', [PostController::class, 'checkPostExistOrNot']);
    Route::post('post-inactive/{post}', [PostController::class, 'postInactive'])->name('post.inactive');
    Route::post('post-active/{post}', [PostController::class, 'postActive'])->name('post.active');

    Route::resource('tag', TagController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('website', WebsiteController::class);



    Route::get('test', function () {
        // Mail::to('default@mail.com')->send(new DemoMail);
        $subscribers = Subscriber::latest()->get('email');

        foreach ($subscribers as $subscriber) {

            echo "$subscriber->email <br>";
            // Mail::to($subscriber)->send(new SendNewPostToSubscriberMail($post));
        }
    });
});
