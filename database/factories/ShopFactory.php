<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Shop::class, function () {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'name' => $faker->company,
        'description_preview' => $faker->sentence,
        'logo' => $faker->imageUrl(),
        'cover' => $faker->imageUrl(),
        'city' => $faker->city,
        'description' => $faker->paragraph,
        'return_conditions' => $faker->paragraph,
        'master_logo' => $faker->imageUrl(),
        'master_name' => $faker->name,
        'master_phone' => $faker->phoneNumber,
        'slug' => $faker->unique()->slug,
        'address' => $faker->address,
    ];
});
