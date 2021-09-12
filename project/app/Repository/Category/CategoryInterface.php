<?php

namespace App\Repository\Category;

use App\Models\Category;

interface CategoryInterface
{
    public function getAllCategory();

    public function store($request);

    public function show(Category $category);

    public function update($request, Category $category);

    public function delete(Category $category);
}
