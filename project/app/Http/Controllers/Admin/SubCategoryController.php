<?php

namespace App\Http\Controllers\Admin;

use App\Models\subCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;

class SubCategoryController extends Controller
{

    public function fetchSubCategory()
    {
        return SubCategory::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('Backend.SubCat.index', compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        subCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => $request->name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(subCategory $subCategory)
    {
        return $subCategory;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, subCategory $subCategory)
    {
        $result = $subCategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->name
        ]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(subCategory $subCategory)
    {
        $subCategory->delete();
        return true;
    }
}
