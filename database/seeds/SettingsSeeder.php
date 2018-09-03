<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create(['key' => 'instagram', 'value' => 'https://instagram.com', 'name' => 'Instagram']);
        \App\Models\Setting::create(['key' => 'facebook', 'value' => 'https://facebook.com', 'name' => 'Facebook']);
        \App\Models\Setting::create(['key' => 'vk', 'value' => 'https://vk.com', 'name' => 'Vk']);
        \App\Models\Setting::create(['key' => 'product_day', 'value' => '1', 'name' => 'Товар дня (ID)']);
        \App\Models\Setting::create(['key' => 'collection', 'value' => '1', 'name' => 'Колекция (статья ID)']);
        \App\Models\Setting::create(['key' => 'email', 'value' => 'qwjohnyegpo@gmail.com', 'name' => 'Email для писем со страницы "О нас"']);
    }
}
