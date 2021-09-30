<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function allPost()
    {

        $data = [];
        $data['posts'] = Post::latest()->paginate(6);
        $data['tags'] = Tag::latest()->get();
        $data['latestPosts'] = Post::latest()->limit(3)->get();
        $data['categories'] = Category::latest()->get();
        // $latest_post =  Post::latest()->limit(3)->get();
        return view('Frontend.post.all_post', $data);

    }
    public function showSinglePost(Post $slug)
    {
        $slug->increment('view', 1);
        $data = [];
        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        $data['latestPosts'] = Post::latest()->limit(3)->get();
        $post = $slug->load('author', 'category', 'sub_category', 'tags');
        return view('Frontend.post.single_post', compact('post'), $data);
    }


    public function categoryWisePosts(Category $slug)
    {
        $data = [];
        $data['posts'] = $slug->posts;
        $data['tags'] = Tag::latest()->get();
        $data['latestPosts'] = Post::latest()->limit(3)->get();
        $data['categories'] = Category::latest()->get();
        $latest_post =  Post::latest()->limit(3)->get();
        return view('Frontend.post.all_post', $data);
    }

    public function tagWisePosts(Tag $slug)
    {
        //   return $id->posts;
        $data = [];
        $data['posts'] = $slug->posts;
        $data['tags'] = Tag::latest()->get();
        $data['latestPosts'] = Post::latest()->limit(3)->get();
        $data['categories'] = Category::latest()->get();
        return view('Frontend.post.all_post', $data);
    }
}
