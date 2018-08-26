<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    (new Page(\App\Models\User::class))->addBadge(function (){return \App\Models\User::count();}),
    (new Page(\App\Models\Category::class))->addBadge(function (){return \App\Models\Category::count();}),
    (new Page(\App\Models\Delivery::class))->addBadge(function (){return \App\Models\Delivery::count();}),


    (new Page())->setTitle('Настроки приложения (.env)')->setIcon('fa fa-exclamation-triangle')->setUrl(route('admin.env.editor')),
];
