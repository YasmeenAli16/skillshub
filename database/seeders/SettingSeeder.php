<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

            'email' => 'contact@skillshub.com',
            'phone' => '0123456789',
            'facebook' => 'https://www.facebook.com',
            'twiter' => 'https://www.facebook.com',
            'instagram' => 'https://www.facebook.com',
            'youtube' => 'https://www.facebook.com',
            'linkedin' => 'https://www.facebook.com'


        ]);
    }
}
