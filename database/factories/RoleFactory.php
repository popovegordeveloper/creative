<?php

$factory->define(App\Models\Role::class, function () {
    return [
        'name' => 'Admin',
        'display_name' => 'Администратор',
        'description' => 'Администратор',
    ];
});

$factory->defineAs(App\Models\Role::class, 'seller', function () {
    return [
        'name' => 'Seller',
        'display_name' => 'Продавец',
        'description' => 'Продавец',
    ];
});

$factory->defineAs(App\Models\Role::class, 'buyer', function () {
    return [
        'name' => 'Buyer',
        'display_name' => 'Покупатель',
        'description' => 'Покупатель',
    ];
});
