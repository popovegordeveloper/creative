<?php

use Illuminate\Database\Seeder;

class DeliveriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Delivery::create(['name' => 'Почта России']);
        \App\Models\Delivery::create(['name' => 'Курьерская служба']);
        \App\Models\Delivery::create(['name' => 'Самовывоз']);
    }
}
