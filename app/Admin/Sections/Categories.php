<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Categories extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Категории товаров';
        $this->icon = 'fa fa-user-o';
    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay()
    {
        return AdminDisplay::datatables()
            ->setApply(function ($query) { $query->orderBy('created_at', 'desc'); })
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                \AdminColumn::text('name', 'Название'),
                \AdminColumn::text('parent.name', 'Родительская категория'),
                \AdminColumnEditable::checkbox('is_active', 'Да', 'Нет', 'Активна?'),
            ])
            ->setDisplaySearch(true)
            ->paginate(25);
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
                        AdminFormElement::select('parent_category_id', 'Родительская категория')->setModelForOptions(Category::class)->setDisplay('name')
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
