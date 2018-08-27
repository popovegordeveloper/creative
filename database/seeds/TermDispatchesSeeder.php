<?php

use Illuminate\Database\Seeder;

class TermDispatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TermDispatch::create(['name' => '1 день']);
        \App\Models\TermDispatch::create(['name' => '2-4 дня']);
        \App\Models\TermDispatch::create(['name' => '5-7 дней']);
        \App\Models\TermDispatch::create(['name' => '2 недели']);
        \App\Models\TermDispatch::create(['name' => '1 месяц']);
    }
}
