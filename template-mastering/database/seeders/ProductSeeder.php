<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'title' => 'lorem this isdfbdskfhdl',
                'slug' => 'ddd',
                'view' => rand(10, 100),
                'description' => 'sssss',
                'quantity' => rand(10, 30)
            ]);
        }
    }
}
