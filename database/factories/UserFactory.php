<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => "$faker->firstName $faker->lastName",
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123123'),
        'remember_token' => str_random(10),
    ];
});
