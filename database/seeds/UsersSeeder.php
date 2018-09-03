<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::create([
            'name' => 'Администратор',
            'email' => 'admin@admin.ru',
            'password' => bcrypt('admin'),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        $admin->roles()->attach('1');

        factory(\App\Models\User::class, 20)->create()->each(function ($user){
            $user->roles()->attach([2,3]);
            $user->shop()->save(factory(\App\Models\Shop::class)->make());
        });

    }
}
