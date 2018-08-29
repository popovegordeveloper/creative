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

class Settings extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Настройки';
        $this->icon = 'fa fa-cog';
    }

    public function isCreatable()
    {
        return false;
    }

    public function onDisplay()
    {
        $display = AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                AdminColumn::text('name', 'Настроойка'),
                \AdminColumnEditable::text('value', 'Значение'),
            ]);

        return $display;

    }

    public function onEdit($id)
    {
        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('value', 'Значение')->required(),
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
