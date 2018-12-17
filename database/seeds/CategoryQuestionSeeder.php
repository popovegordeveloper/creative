<?php

use Illuminate\Database\Seeder;

class CategoryQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CategoryQuestion::create(['name' => 'Продавцам хендмейд изделий']);
        \App\Models\CategoryQuestion::create(['name' => 'Покупателям хендмейд изделий']);
    }
}
