<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Color::class, function () {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'name' => $faker->unique()->colorName,
    ];
});
