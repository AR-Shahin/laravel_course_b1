<?php

namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Http;

class AnotherRepository implements CategoryInterface
{
    protected $path = 'http://127.0.0.1:8001/api/category';
    public function getAllCategory()
    {
        $res = Http::get($this->path);
        return json_decode($res->body());
    }

    public function store($request)
    {
    }

    public function show(Category $category)
    {
    }

    public function update($request, Category $category)
    {
    }

    public function delete(Category $category)
    {
    }
}
