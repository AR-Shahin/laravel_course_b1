<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Profile::create([
                'user_id' => $i,
                'phone' => "123456789",
                'address' => Str::random(3),
                'post_code' => $i % 2 == 0 ? rand(10, 100) : null
            ]);
        }
    }
}
