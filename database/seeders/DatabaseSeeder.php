<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SiteConfig;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name' => 'Pawan Bhatta',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 0
        ]);

        $keys = array("logo", "website_title", "facebook", "instagram", "linkedin", "youtube", "tiktok", "footer_about", "copyright", "website", "posted", "author", "awards", "clients", "address", "phone", "email", "tel");


        foreach ($keys as $key) {
            SiteConfig::create([
                'key' => $key,
            ]);
        }
    }
}
