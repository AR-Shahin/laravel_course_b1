<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\City;
use App\Models\Country;
use App\Models\Machanic;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Skill;
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

        $countries = ['BD', 'IND', 'PAK', 'USA', 'AUS'];
        $cities = ['dhaka', 'cumilla', 'chandpur', 'noakhali', 'pabna'];
        $shops = ['ABC', 'BCD', 'EFG', 'HID', 'LDR'];
        for ($i = 0; $i < count($countries); $i++) {
            Country::create([
                'name' => $countries[$i],
            ]);
        }
        for ($i = 0; $i < count($cities); $i++) {
            City::create([
                'country_id' => rand(1, 5),
                'name' => $cities[$i],
            ]);
        }
        for ($i = 0; $i < count($shops); $i++) {
            Shop::create([
                'city_id' => rand(1, 5),
                'name' => $shops[$i],
            ]);
        }
        $skills = ['PHP', 'LARAVEL', 'VUE', 'REACT', 'JS'];
        for ($i = 0; $i < count($skills); $i++) {
            Skill::create([
                'name' => $skills[$i],
            ]);
        }
    }
}
