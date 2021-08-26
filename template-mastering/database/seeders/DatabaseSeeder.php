<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skill;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
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
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(1000)->create();
        // $this->call([
        //     ProductSeeder::class
        // ]);


        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => 'password',
            'role' => 'admin',
            'email_verified_at' => now()
        ]);
        User::create([
            'name' => 'Editor',
            'email' => 'editor@mail.com',
            'password' => 'password',
            'role' => 'editor',
            'email_verified_at' => now()
        ]);
        User::create([
            'name' => 'Moderator',
            'email' => 'moderator@mail.com',
            'password' => 'password',
            'role' => 'moderator',
            'email_verified_at' => now()
        ]);

        $this->call([CategorySeeder::class]);

        for ($i = 1; $i < 10; $i++) {
            Skill::create([
                'name' => Str::random(5),
                'user_id' => rand(1, 3)
            ]);
        }
    }
}
