<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userPostComments()
    {
        $comments = auth('user')->user()->comments;
        return view('Frontend.user.comments', compact('comments'));
    }
}
