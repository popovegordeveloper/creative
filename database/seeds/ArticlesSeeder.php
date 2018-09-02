<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(\App\Models\Article::class, 20)->create();
        } catch (Exception $exception){
            $exception->getMessage();
        }
    }
}
