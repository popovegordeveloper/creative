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

class Colors extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Цвета';
        $this->icon = 'fa fa-flask';
    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay()
    {

        return AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                AdminColumn::text('name', 'Цвет'),
            ]);
    }

    public function onEdit($id)
    {

        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Цвет')->required(),
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
        return true;
    }
}
