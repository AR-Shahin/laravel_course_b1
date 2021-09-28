<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Admin;
use App\Models\PostTag;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);
        // \App\Models\Admin::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            WebsiteSeeder::class,
            TagSeeder::class
        ]);
        SubCategory::factory(10)->create();
        Post::factory(15)->create();
        PostTag::factory(25)->create();
    }
}
