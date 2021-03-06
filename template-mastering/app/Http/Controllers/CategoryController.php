<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view()->exists('Category.index') ? view('Category.index', compact('categories')) : abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::allows('isAdmin') ? Response::allow()
            : abort(403);
        return view()->exists('Category.create') ? view('Category.create') : abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $this->validate($request, [
        //     'name' => ['required', 'unique:categories,name'],
        //     'image' => ['required', 'mimes:jpg,png'],
        // ]);


        $file = $request->file('image');

        $fileName = time() . '_' . uniqid() . '.' . $file->extension();
        Storage::putFileAs("public/category", $file, $fileName);

        $path =  "storage/category/" . $fileName;

        $data = [
            'name' => $request->name,
            'slug' => $request->name,
            'image' => $path
        ];
        $cat =  Category::create($data);
        if ($cat) {
            $this->setNotificationMessage();
            return redirect()->route('category.index');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $category = Category::find($category);
        return view('Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        Gate::allows('update-post', $category) ? Response::allow()
            : abort(403);
        return view('Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $OldImgPath = $category->image;

        if ($request->has('image')) {
            $file = $request->file('image');

            $fileName = time() . '_' . uniqid() . '.' . $file->extension();
            Storage::putFileAs("public/category", $file, $fileName);

            $path =  "storage/category/" . $fileName;
            $category->update([
                'name' => $request->name,
                'slug' => $request->name,
                'image' => $path
            ]);

            if (file_exists($OldImgPath)) {
                unlink($OldImgPath);
            }
        } else {
            $category->update([
                'name' => $request->name,
                'slug' => $request->name
            ]);
        }
        $this->setNotificationMessage('Data Updated Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $imgPath = $category->image;
        if (file_exists($category->image)) {
            unlink($category->image);
        }
        $category->delete();

        $this->setNotificationMessage('Data has been deleted!');
        return back();
    }
}
