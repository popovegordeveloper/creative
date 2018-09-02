<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Slide::class, function () {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'name' => $faker->sentence,
        'image' => $faker->imageUrl(),
        'description' => $faker->sentence,
        'url' => $faker->url,
    ];
});
