<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        return view()->exists('welcome') ? view('welcome') : abort(404);
    }

    public function params($id)
    {
        return $id;
    }
}
