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

class Articles extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Блог';
        $this->icon = 'fa fa-rss';
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
                AdminColumn::text('preview_description', 'Краткое описание'),
                \AdminColumnEditable::checkbox('in_main', 'Да', 'Нет', 'Отображать на гланой'),
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
                        AdminFormElement::textarea('preview_description', 'Краткое описание')->required(),
                        AdminFormElement::ckeditor('description', 'Описание')->required(),
                        AdminFormElement::checkbox('description', 'Отображать на гланой'),
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
