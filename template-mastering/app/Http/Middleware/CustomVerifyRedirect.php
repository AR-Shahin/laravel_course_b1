<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomVerifyRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (is_null($request->user()->email_verified_at)) {

            if ($request->user()->getTable() === 'admins') {
                return redirect()->route('admin.verification.notice');
            } else if ($request->user()->getTable() === 'web') {
                return redirect()->route('verification.notice');
            }
        }





        // if (is_null($request->user()->email_verified_at)) {
        //     if ($request->user()->getTable() === 'admins') {
        //         return redirect()->route('admin.verification.notice');
        //     } else if ($request->user()->getTable() === 'users') {
        //         return redirect()->route('verification.notice');
        //     } else if ($request->user()->getTable() === 'teachers') {
        //         return redirect()->route('teacher.verification.notice');
        //     }
        // }

        return $next($request);
    }
}
