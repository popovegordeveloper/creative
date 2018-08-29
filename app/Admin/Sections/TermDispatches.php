<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class TermDispatches extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Периуды доставки';
        $this->icon = 'fa fa-clock-o';
    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay($scopes = null)
    {
        $display = AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                AdminColumn::text('name', 'Периуд'),
            ]);

        return $display;

    }

    public function onEdit($id)
    {
        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Периуд')->required(),
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
