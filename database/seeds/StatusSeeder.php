<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Status::create(['text' => 'Оформлен']);
        \App\Models\Status::create(['text' => 'Принят']);
        \App\Models\Status::create(['text' => 'Доставляется']);
        \App\Models\Status::create(['text' => 'Выполнен']);
        \App\Models\Status::create(['text' => 'Отменен']);
        \App\Models\Status::create(['text' => 'Завершен']);
    }
}
