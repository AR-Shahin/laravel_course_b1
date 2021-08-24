<?php

use App\Models\User;
use App\Models\Product;
use App\Scopes\ViewScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('category', CategoryController::class);

Route::get('login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('authenticate', function (Request $request) {

    //  return $request->all();
    $credentials = $request->validate([
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required'],
    ]);
    // if ($request->remember) {
    //     $credentials['remember'] =  true;
    // }
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('authenticate');


Route::get('register', fn () => view('auth.register'))->name('register')->middleware('guest');

Route::post('store', function (Request $request) {

    //return $request->all();
    $request->validate([
        'name' => ['required'],
        'email' => 'required'
    ]);
    $user = User::create($request->only(['name', 'email', 'password']));

    event(new Registered($user));
    $request->session()->regenerate();
    Auth::guard('web')->login($user);

    return redirect()->intended('dashboard');
    // return $request->all();
})->name('store')->middleware('guest');

Route::get('dashboard', fn () => view('auth.dashboard'))->name('dashboard')->middleware(['auth', 'verified']);

Route::post('logout', function (Request $request) {

    Auth::guard('web')->logout();

    return redirect()->route('login');
})->name('logout');

# protected
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
// Route::resource('post', CategoryController::class)->except(['destroy']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route::get('test', function () {

//     return Product::count();
// });


// Route::get('scope', function () {
//     // return Product::withoutGlobalScope(ViewScope::class)->get()->count();
//     // return Product::withoutGlobalScopes(['lessThanFifty', 'another'])->get()->count();

//     // return Product::Active()->orWhere->Popular()->get()->count();


//     return Product::DynamicStatus()->get()->count();
// });


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
