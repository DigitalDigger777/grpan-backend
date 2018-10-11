<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();
        $setting->locale = 'EN';
        $setting->data = [
            'publishing_form_email' => 'korman.yuri@gmail.com',
            'contact_us_email' => 'korman.yuri@gmail.com'
        ];

        $setting->save();
    }
}
