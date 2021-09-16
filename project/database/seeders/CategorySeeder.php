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
        $categories = ['PHP', 'LARAVEL', 'JS'];

        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i],
                'slug' => $categories[$i]
            ]);
        }
    }
}
