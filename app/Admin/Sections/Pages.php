<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Pages extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Страницы';
        $this->icon = 'fa fa-newspaper-o';
    }

    public function isCreatable()
    {
        return false;
    }

    public function onDisplay()
    {

        return AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                AdminColumn::text('name', 'Страница'),
            ]);
    }

    public function onEdit($id)
    {

        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::ckeditor('content', 'Контент'),
                    ])
            ])
        );
    }

    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function isDeletable(Model $model)
    {
        return false;
    }
}
