<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    (new Page(\App\Models\User::class))->addBadge(function (){return \App\Models\User::count();}),
    (new Page(\App\Models\Category::class))->addBadge(function (){return \App\Models\Category::count();}),


    (new Page())->setTitle('.env')->setIcon('fa fa-exclamation-triangle')->setUrl(route('admin.env.editor')),
];
