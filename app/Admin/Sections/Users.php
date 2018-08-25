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

class Users extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Пользователи';
        $this->icon = 'fa fa-user-o';
    }

    public function isCreatable()
    {
        return false;
    }

    public function onDisplay()
    {
        return AdminDisplay::datatables()
            ->setApply(function ($query) { $query->orderBy('created_at', 'desc'); })
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                \AdminColumn::text('name', 'Имя'),
                \AdminColumn::link('email', 'Email'),
                \AdminColumn::lists('roles.display_name', 'Роли'),
            ])
            ->setDisplaySearch(true)
            ->paginate(25);
    }

    public function onEdit($id)
    {

        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([AdminFormElement::text('name', 'Имя и фамилия')])
                    ->addColumn([AdminFormElement::text('email', 'Email')]),
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
