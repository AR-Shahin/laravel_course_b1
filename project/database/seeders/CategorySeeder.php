<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Category 1', 'Category 2', 'Category 3'];

        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i]
            ]);
        }
    }
}
