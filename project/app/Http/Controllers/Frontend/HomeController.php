<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data = [];
        $data['sliders'] = Slider::latest()->get();
        $data['rand_posts'] = Post::with('author', 'category', 'sub_category')->inRandomOrder()->take(3)->get();
        $data['latest_posts'] = Post::with('author', 'category', 'sub_category')->latest()->take(3)->get();
        return view('Frontend.home', $data);
    }
}
