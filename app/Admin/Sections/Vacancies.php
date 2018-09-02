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

class Vacancies extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Вакансии';
        $this->icon = 'fa fa-clipboard';
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
                AdminColumn::text('name', 'Название'),
                AdminColumn::text('preview_description', 'Краткое описание'),
                AdminColumn::text('description', 'Описание'),
            ]);
    }

    public function onEdit($id)
    {

        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Название')->required(),
                        AdminFormElement::textarea('preview_description', 'Краткое описание')->required(),
                        AdminFormElement::textarea('description', 'Описание')->required(),
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
