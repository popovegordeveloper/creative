<?php

use Illuminate\Database\Seeder;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(\App\Models\Slide::class, 5)->create();
        } catch (Exception $exception){
            $exception->getMessage();
        }
    }
}
