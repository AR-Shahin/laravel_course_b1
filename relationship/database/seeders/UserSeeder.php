<?php

namespace Database\Seeders;

use App\Models\User;
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
    }
}
