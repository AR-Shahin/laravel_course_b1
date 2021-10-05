<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\SocialNewUserMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function login($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        //return $provider;
        $userData = Socialite::driver($provider)->user();

        $user = User::whereEmail($userData->getEmail())->first();

        if (!$user) {
            $user =  User::create([
                'name' => $userData->getName(),
                'email' => $userData->getEmail(),
                'password' => 'password'
            ]);

            Mail::to($user->email)->send(new SocialNewUserMail($user));
        }
        Auth::guard('user')->login($user);
        return redirect()->route('dashboard');
    }
}
