<?php

use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Payment::create([
            'name' => 'Наличными при самовывозе или курьеру'
        ]);

        \App\Models\Payment::create([
            'name' => 'Наложенный платеж'
        ]);
    }
}
