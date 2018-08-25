<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Role::class)->create();
        factory(\App\Models\Role::class, 'seller')->create();
        factory(\App\Models\Role::class, 'buyer')->create();
    }
}
