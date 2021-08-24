<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\AdminRegisterEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', function () {
        return view('admin.login');
    })->name('login')->middleware(['guest:admin']);

    Route::post('authenticate', function (Request $request) {

        //  return $request->all();
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    })->name('authenticate');


    Route::get('register', fn () => view('admin.register'))->name('register')->middleware('guest:admin');

    Route::post('store', function (Request $request) {

        //return $request->all();
        $request->validate([
            'name' => ['required'],
            'email' => 'required'
        ]);
        $admin = Admin::create($request->only(['name', 'email', 'password']));

        event(new AdminRegisterEvent($admin));
        $request->session()->regenerate();
        Auth::guard('admin')->login($admin);

        return redirect()->intended('admin/dashboard');
        // return $request->all();
    })->name('store')->middleware('guest:admin');

    Route::get('dashboard', fn () => view('admin.dashboard'))->name('dashboard')->middleware(['auth:admin', 'custom_verify']);

    Route::post('logout', function (Request $request) {

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    })->name('logout');

    # protected
    Route::get('/email/verify', function () {
        return view('admin.verify-email');
    })->middleware('auth:admin')->name('verification.notice');


    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('admin/dashboard');
    })->middleware(['auth:admin', 'signed'])->name('verification.verify');


    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth:admin', 'throttle:6,1'])->name('verification.send');



    # Reset Password

    Route::get('/forgot-password', function () {
        return view('admin.forgot-password');
    })->middleware('guest')->name('password.request');

    Route::post('/forgot-password', function (Request $request) {

        //  return $request->all();
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->middleware('guest:web')->name('password.email');


    Route::get('/reset-password/{token}', function ($token) {
        return view('admin.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');


    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        //  return $request->all();

        $status = Password::broker('admins')->reset(
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
            ? redirect()->route('admin.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->middleware('guest:admin')->name('password.update');
});
