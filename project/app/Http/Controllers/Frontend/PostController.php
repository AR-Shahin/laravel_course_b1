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
        $post = $slug->load('author', 'category', 'sub_category', 'tags');
        // $posts = Post::latest()->limit(3)->get();
        return view('Frontend.post.single_post', compact('post', 'posts'), $data);
    }


    public function categoryWisePosts(Category $slug)
    {
        $data = [];
        $data['posts'] = $slug->posts;
        $data['tags'] = Tag::latest()->get();
        //  $data['latest_posts'] = Post::latest()->limit(3)->get();
        $data['categories'] = Category::latest()->get();
        $latest_post =  Post::latest()->limit(3)->get();
        return view('Frontend.post.all_post', $data, compact('latest_post'));
    }

    public function tagWisePosts(Tag $id)
    {
        //   return $id->posts;
        $data = [];
        $data['posts'] = $id->posts;
        $data['tags'] = Tag::latest()->get();
        //  $data['latest_posts'] = Post::latest()->limit(3)->get();
        $data['categories'] = Category::latest()->get();
        $latest_post =  Post::latest()->limit(3)->get();
        return view('Frontend.post.all_post', $data, compact('latest_post'));
    }
}
