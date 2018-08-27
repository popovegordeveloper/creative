<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function () {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'photos' => [$faker->imageUrl(), $faker->imageUrl(), $faker->imageUrl(), $faker->imageUrl(), $faker->imageUrl()],
        'name' => $faker->words(3, true),
        'description' => $faker->realText(),
        'composition' => $faker->realText(),
        'price' => $faker->randomNumber(4),
        'sale_price' => $faker->randomNumber(2),
        'qty' => $faker->randomDigit,
        'shop_id' => rand(1, 20),
        'category_id' => rand(1, 117),
        'term_dispatch_id' => rand(1, 5),
    ];
});
