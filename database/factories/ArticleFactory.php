<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function () {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'name' => $faker->sentence,
        'image' => $faker->imageUrl(),
        'preview_description' => $faker->sentence,
        'description' => $faker->paragraph,
        'in_main' => rand(0, 1),
    ];
});
