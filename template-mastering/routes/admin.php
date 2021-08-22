<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Events\AdminRegisterEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
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
});
