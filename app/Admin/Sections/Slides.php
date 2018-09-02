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

class Slides extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Слайды на главной';
        $this->icon = 'fa fa-sliders';
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
                AdminColumn::image('image', 'Изображение'),
                AdminColumn::text('description', 'Описание'),
                AdminColumn::text('url', 'URL')
            ]);
    }

    public function onEdit($id)
    {

        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Название')->required(),
                        AdminFormElement::image('image', 'Изображение')->required(),
                        AdminFormElement::text('description', 'Описание')->required(),
                        AdminFormElement::text('url', 'URL')->required(),
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
