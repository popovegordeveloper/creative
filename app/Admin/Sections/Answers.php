<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Answers extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Ответы';
    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay($scopes = null)
    {

        $display = AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('text', 'Ответ'),
                AdminColumn::text('question.text', 'Вопрос'),
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
                        AdminFormElement::ckeditor('text', 'Ответ')->required(),
                        AdminFormElement::select('question_id', 'Вопрос')->setModelForOptions(Question::class)->setDisplay('text')->required(),
                    ])
            ])
        );


        $tabs->appendTab($shop, 'Ответ');


        return $tabs;
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
