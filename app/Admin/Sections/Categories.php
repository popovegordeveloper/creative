<?php

namespace App\Admin\Models;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Categories extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Категории товаров';
        $this->icon = 'fa fa-align-center';
        $this->created(function($config, \Illuminate\Database\Eloquent\Model $model) {
            /** @var $model \App\Models\Category */
            if(strlen($model->slug) < 1)
                $model->slug = Str::slug($model->name);
                $model->save();
        });

    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay()
    {
        return AdminDisplay::tree()->setValue('name');
    }

    public function onEdit($id)
    {

        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Имя'),
                    ])
                    ->addColumn([
                        AdminFormElement::text('slug', 'Slug'),
                    ])
                    ->addColumn([
                        AdminFormElement::checkbox('is_active', 'Активна')
                    ]),
            ])
        );
    }

    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function isDeletable(Model $model)
    {
        return true;
    }
}
