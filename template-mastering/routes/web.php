<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Scopes\ViewScope;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('skill', SkillController::class);
Route::resource('category', CategoryController::class);

Route::get('login', function () {
    return view('auth.login');
})->name('login')->middleware('guest:web');

Route::post('authenticate', function (Request $request) {

    // return $request->all();
    $credentials = $request->validate([
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required'],
    ]);
    // if ($request->remember) {
    //     $credentials['remember'] =  true;
    // }
    if (Auth::guard('web')->attempt($credentials)) {
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

    return redirect()->route('dashboard');
    // return $request->all();
})->name('store')->middleware('guest');

Route::get('dashboard', fn () => view('auth.dashboard'))->name('dashboard')->middleware(['auth:web', 'custom_verify']);

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


# Reset Password

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email|exists:users,email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest:web')->name('password.email');


Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => $password
            ])->setRememberToken(Str::random(60));

            $user->save();

            //  event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest:web')->name('password.update');



Route::get('adminCanAccess', fn () => 'admin Can get this access')->middleware('can:isAdmin');



# Cache
Route::get('cache', function () {


    // return Cache::get('test', 'nai');
    // return Cache::get('test', function () {
    //     return Category::get();
    // }, 500);

    //  return  Cache::forget('categories');
    // if (Cache::has('test')) {
    //     return 'ok';
    // } else {
    //     return 'no';
    // }
    $categories = Cache::rememberForever('categories', function () {
        return Category::get();
    });
    return view('cache', compact('categories'));
})->name('cache')->middleware('auth');



Route::get('test', function () {

    // return Category::create([
    //     'name' => 'dddddd',
    //     'slug' => 'sss',
    //     'user_id' => 2
    // ]);

    return Category::find(2)->update([
        'name' => 'new Name new'
    ]);
});
