<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*')) {
                if (!Auth::guard('admin')->check()) {
                    return route('admin.login');
                }
            }
            // if ($request->is('student/*')) {
            //     if (!Auth::guard('student')->check()) {
            //         return route('student.login');
            //     }
        } elseif (!Auth::guard('web')->check()) {
            return route('login');
        }
    }
}
