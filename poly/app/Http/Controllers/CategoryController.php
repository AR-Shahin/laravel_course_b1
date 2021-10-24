<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        return $this->responseOk(
            Category::get()
        );
    }

    public function store(Request $request)
    {
        $request->validate(['name' => ['required', 'unique:categories']]);

        $category = Category::create($request->only(['name']));

        return $this->responseOk($category, 'Data created Successfully!', 201);
    }

    function show(Category $category)
    {
        return $this->responseOk(
            $category
        );
    }
    function update(Request $request, Category $category)
    {
        return $request->all();
        $request->validate(['name' => "required|unique:categories,name"]);
        $category->update($request->only(['name']));
        return $this->responseOk(
            $category,
            'Data Updated Successfully!'
        );
    }
    function destroy(Category $category)
    {
        $category->delete();
        return $this->responseOk(
            [],
            'Data Deleted Successfully!'
        );
    }
}
