<?php

namespace App\Admin\Models;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Category;
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
            if(strlen($model->slug) < 1) {
                $model->slug = Str::slug($model->name);
                $model->save();
            }
        });

        $this->updated(function($config, \Illuminate\Database\Eloquent\Model $model) {
            /** @var $model \App\Models\Category */

            if(!$model->is_active) $is_active = false;
            else $is_active = true;
            $model->children()->update(['is_active' => $is_active]);
            $model->leaves()->update(['is_active' => $is_active]);
        });

    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay()
    {
        $all_categories =  AdminDisplay::tree()->setValue('name');
        $active_categories =  AdminDisplay::tree()->setValue('name')->getScopes()->set('active');
        $unactive_categories =  AdminDisplay::tree()->setValue('name')->getScopes()->set('disabled');

        $tabs = AdminDisplay::tabbed();
        $tabs->setElements([
            AdminDisplay::tab($all_categories)->setLabel('Все категории')->setBadge(Category::count()),
            AdminDisplay::tab($active_categories)->setLabel('Активные категории')->setBadge(Category::active()->count()),
            AdminDisplay::tab($unactive_categories)->setLabel('Неактивные категории')->setBadge(Category::disabled()->count())
        ]);

        return $tabs;
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
                        AdminFormElement::text('slug', 'URL'),
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
