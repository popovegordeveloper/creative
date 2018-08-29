<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    (new Page(\App\Models\User::class))->addBadge(function (){return \App\Models\User::count();}),
    (new Page(\App\Models\Category::class))->addBadge(function (){return \App\Models\Category::count();}),
    (new Page(\App\Models\Shop::class))->addBadge(function (){return \App\Models\Shop::count();}),
    (new Page(\App\Models\Product::class))->addBadge(function (){return \App\Models\Product::count();}),
    (new Page(\App\Models\Delivery::class))->addBadge(function (){return \App\Models\Delivery::count();}),
    (new Page(\App\Models\TermDispatch::class))->addBadge(function (){return \App\Models\TermDispatch::count();}),
    (new Page(\App\Models\Setting::class))->addBadge(function (){return \App\Models\Setting::count();}),


    (new Page())->setTitle('Настроки приложения (.env)')->setIcon('fa fa-exclamation-triangle')->setUrl(route('admin.env.editor')),
];
