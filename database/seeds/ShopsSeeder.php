<?php

use Illuminate\Database\Seeder;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = \App\Models\Shop::all();
        foreach ($shops as $shop)
            $shop->deliveries()->attach([
                1 => ['price' => rand(1, 100)],
                3 => ['price' => rand(1, 100)]
            ]);
    }
}
