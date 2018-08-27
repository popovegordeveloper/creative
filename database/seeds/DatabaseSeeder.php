<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(CategoriesSeeder::class);
         $this->call(DeliveriesSeeder::class);
         $this->call(TermDispatchesSeeder::class);
         $this->call(ShopsSeeder::class);
         $this->call(ProductsSeeder::class);
    }
}
