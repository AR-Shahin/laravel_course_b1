<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showSinglePost(Post $slug)
    {
        $slug->increment('view', 1);
        $data = [];
        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        $post = $slug->load('author', 'category', 'sub_category', 'tags');
        $posts = Post::latest()->limit(3)->get();
        return view('Frontend.post.post', compact('post', 'posts'), $data);
    }
}
