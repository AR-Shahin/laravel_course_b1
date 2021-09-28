<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'title' => 'Default Title',
            'logo' => 'storage/website/default.png',
            'address' => 'Default Address',
            'email' => 'default@gmail.com',
            'phone' => '01600000000',
            'facebook' => 'www.facebook.com',
            'twitter' => 'www.twitter.com',
            'instagram' => 'www.instagram.com',
            'behance' => 'www.behance.com',
            'footer_1' => 'Copy Right by DeveloperBiplob 2021',
            'footer_2' => 'Copy Right by DeveloperBiplob 2022'
        ]);
    }   
}
