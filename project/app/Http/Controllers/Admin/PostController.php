<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Auth;
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
        return view('Backend.Post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('Backend.Post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $file = $request->file('image');

        $fileName = time() . '_' . uniqid() . '.' . $file->extension();
        Storage::putFileAs("public/post", $file, $fileName);

        $path =  "storage/post/" . $fileName;

        $data = [
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'sub_cat_id' => $request->sub_cat_id,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'status' => $request->status,
            'author_id' => '1'
        ];
        $post =  Post::create($data);
        if ($post) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
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
