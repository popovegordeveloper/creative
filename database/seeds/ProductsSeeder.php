<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Product::class, 50)->create()->each(function ($product){
            $product->deliveries()->attach([
                1 => ['price' => rand(1, 100)],
                3 => ['price' => rand(1, 100)]
            ]);
        });
    }
}
