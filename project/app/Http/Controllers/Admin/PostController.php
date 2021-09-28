<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Actions\File;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author')->latest()->get();
        return view('Backend.Post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::latest()->get();
        $categories = Category::latest()->get();
        return view('Backend.Post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //return $request->tags;
        $file = $request->file('image');

        $data = [
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'sub_cat_id' => $request->sub_cat_id,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'status' => $request->status,
            'author_id' => auth('web')->id(),
            'image' => File::upload($file, 'post')
        ];
        $post =  Post::create($data);
        if ($post) {
            $post->tags()->sync($request->tags);
            $this->notificationMessage();
            return redirect()->route('admin.post.index');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view("Backend.Post.show", [
            'post' => $post->load('tags', 'category')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $postTags = $this->getIDByFunction($post->tags);
        return view('Backend.Post.edit', compact(['post', 'categories', 'tags', 'postTags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, post $post)
    {
        $OldImgPath = $post->image;

        if ($request->has('image')) {
            $file = $request->file('image');

            $post->update([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'sub_cat_id' => $request->sub_cat_id,
                'short_des' => $request->short_des,
                'long_des' => $request->long_des,
                'author_id' => auth('web')->id(),
                'image' => File::update($file, $OldImgPath, 'post')
            ]);
        } else {
            $post->update([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'sub_cat_id' => $request->sub_cat_id,
                'short_des' => $request->short_des,
                'long_des' => $request->long_des,
                'author_id' => auth('web')->id(),
            ]);
        }
        $post->tags()->sync($request->tags);
        $this->notificationMessage('Data Update Successfully!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        // return  $tags  = DB::table('post_tag')->where('post_id', $post->id)->get('id');
        $tags = $this->getIDByFunction($post->tags);
        File::deleteFile($post->image);
        $post->tags()->detach($tags);
        $post->delete();
        $this->notificationMessage('Data Delete Successfully!');
        return redirect()->route('admin.post.index');
    }

    protected function getIDByFunction($items)
    {
        $ids = [];
        foreach ($items as $id) {
            $ids[] = $id->id;
        }

        return $ids;
    }
    public function getSubCategoryByCategory($category_id)
    {
        return SubCategory::whereCategoryId($category_id)->get();
    }

    public function checkPostExistOrNot($title)
    {
        $post = Post::whereTitle($title)->first();
        if ($post) {
            return response()->json([
                'flag' => 'EXIST'
            ]);
        } else {
            return response()->json([
                'flag' => 'NOT_EXIST'
            ]);
        }
    }
}
