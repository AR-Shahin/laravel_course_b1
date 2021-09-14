<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repository\Category\CategoryInterface;

class CategoryController extends Controller
{
    // protected $category;
    // function __construct(CategoryInterface $category)
    // {
    //     $this->category = $category;
    // }

    function index()
    {
        return view('Backend.Category.index');
    }

    function fetchCategory()
    {
        return Category::get();
    }

    public function store(CategoryRequest $request)
    {
        $category =  Category::create([
            'name' => $request->name,
            'slug' => $request->name
        ]);
        info($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return 1;
    }
}
