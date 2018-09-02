<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Product;
use App\Models\User;
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
        $columns = [
            AdminColumn::text('id', 'ID'),
            \AdminColumn::text('name', 'Имя'),
            \AdminColumn::text('patronymic', 'Отчество'),
            \AdminColumn::text('surname', 'Фамилия'),
            \AdminColumn::link('email', 'Email'),
            \AdminColumn::lists('roles.display_name', 'Роли'),
            \AdminColumnEditable::checkbox('is_activate', 'Да', 'Нет', 'Подтвержден'),
        ];

        $all_users =  AdminDisplay::table()->setModelClass(User::class)->setApply(function($query) {
            $query->latest();
        })->paginate(50)->setColumns($columns);

        $activated_users =  AdminDisplay::table()->setApply(function($query) {
            $query->latest();
        })->paginate(50)->getScopes()->set('activated') ->setColumns($columns);

        $unactivated_users = AdminDisplay::table()->setApply(function($query) {
            $query->latest();
        })->paginate(50)->getScopes()->set('unactivated') ->setColumns($columns);

        $tabs = AdminDisplay::tabbed();

        $tabs->setElements([
            AdminDisplay::tab($all_users)->setLabel('Все пользователи')->setBadge(User::count()),
            AdminDisplay::tab($activated_users)->setLabel('Подтвержденные пользователи')->setBadge(User::activated()->count()),
            AdminDisplay::tab($unactivated_users)->setLabel('Неподтвержденные пользователи')->setBadge(User::unactivated()->count())
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
                        AdminFormElement::text('email', 'Email')
                    ])
                    ->addColumn([
                        AdminFormElement::text('patronymic', 'Отчество'),
                        AdminFormElement::multiselect('favorite', 'Избранные товары')->setModelForOptions(new Product())->setDisplay('name')
                    ])
                    ->addColumn([
                        AdminFormElement::text('surname', 'Фамилия'),
                        AdminFormElement::checkbox('is_activate', 'Подтвержден')
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
