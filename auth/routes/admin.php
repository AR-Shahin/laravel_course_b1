<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController as AdminRes;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as Logout;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/register', [AdminRes::class, 'create'])
        ->middleware('guest:admin')
        ->name('register');

    Route::post('/register', [AdminRes::class, 'store'])
        ->middleware('guest:admin');

    Route::get('/login', [Logout::class, 'create'])
        ->middleware('guest:admin')
        ->name('login');

    Route::post('/login', [Logout::class, 'store'])
        ->middleware('guest');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth');

    Route::post('/logout', [Logout::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
    Route::get('dashboard', function () {
        return view('admin-dashboard');
    })->middleware('auth:admin');
});
