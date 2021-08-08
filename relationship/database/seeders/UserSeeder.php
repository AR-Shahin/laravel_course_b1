<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use App\Models\Owner;
use App\Models\Machanic;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'Test name ' . $i,
                'email' => "user{$i}@mail.com",
                'password' => bcrypt('password'),
                'status' => $i % 2 == 0 ? true : false
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            Machanic::create([
                'name' => Str::random(3)
            ]);
            Car::create([
                'name' => Str::random(3),
                'machanic_id' => $i
            ]);
            Owner::create([
                'name' => Str::random(3),
                'car_id' => $i
            ]);
        }
    }
}
