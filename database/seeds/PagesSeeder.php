<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Page::create([
            'name' => 'Политика конфиденциальности',
            'slug' => 'privacy-policy',
            'content' => file_get_contents(public_path('pp.txt'))
        ]);

        \App\Models\Page::create([
            'name' => 'Условия использования',
            'slug' => 'using',
            'content' => file_get_contents(public_path('using.txt'))
        ]);

        \App\Models\Page::create([
            'name' => 'Техническая поддержка',
            'slug' => 'technical-support',
            'content' => file_get_contents(public_path('con_rules.txt'))
        ]);
    }
}
