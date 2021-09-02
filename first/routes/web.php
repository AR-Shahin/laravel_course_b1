<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use App\Mail\OrderShipped;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

// // Route::get($uri, $callback);
// // Route::post($uri, $callback);
// // Route::put($uri, $callback);
// // Route::delete($uri, $callback);


// Route::match(['get', 'post'], '/anything', function () {
// });


// // Route::any('/any', function () {
// //     return 'any';
// // });

// Route::redirect('/here', '/redirect');


// Route::get('/redirect', function () {
//     return 'redirected';
// });

// Route::view('view', 'welcome');


// Route::get('params/{id}', function ($id) {
//     return $id;
// })->where('id', '[0-9]+');


// Route::get('name', function () {
//     return 'name';
// })->name('name');


// Route::get('category/create', function () {
//     return 'name';
// })->name('cat.name');


// Route::get('category/edit', function () {
//     return 'name';
// })->name('cat.edit');



// // route group


// Route::prefix('admin')->name('admin.')->middleware('nameCheck')->group(function () {
//     Route::get('/edit', function () {
//         return 'name';
//     });
//     Route::get('/edit', function () {
//         return 'name';
//     })->name('create');
//     Route::get('/edit', function () {
//         return 'name';
//     })->name('edit');

//     Route::get('/edit', function () {
//         return 'name';
//     })->name('add');
// });



// Route::fallback(function () {
//     return view('error');
// });


// Controller

Route::get('/', [TestController::class, 'index'])->name('controller');

Route::get('/params/{id}', [TestController::class, 'params'])->name('controller');


Route::resource('category', CategoryController::class);

# Component


# Mail

Route::get('mail', function () {
    // $users =  User::whereNull('email_verified_at')->get();

    // foreach ($users as $user) {
    //     Mail::to($user->email)->send(new TestMail($user));
    // }
    Mail::to('s@mail.com')->send(new OrderShipped);
    //return new TestMail($user);
});
