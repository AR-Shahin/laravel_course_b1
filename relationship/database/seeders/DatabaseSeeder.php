<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Machanic;
use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProfileSeeder;
use Illuminate\Foundation\Auth\User;

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

        $this->call([
            UserSeeder::class,
            //ProfileSeeder::class
            PostSeeder::class
        ]);
    }
}
