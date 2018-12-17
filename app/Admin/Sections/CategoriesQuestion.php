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

class CategoriesQuestion extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Категории вопросов';
    }

    public function isCreatable()
    {
        return false;
    }

    public function onDisplay($scopes = null)
    {

        $display = AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('name', 'Название категории'),
            ])->paginate(10);

        return $display;
    }

    public function onEdit($id)
    {

        $tabs = AdminDisplay::tabbed();

        $shop = AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Название категории')->required(),

                    ])
            ])
        );


        $tabs->appendTab($shop, 'Категория');


        return $tabs;
    }

    public function isDeletable(Model $model)
    {
        return false;
    }
}
