<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\CategoryQuestion;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Questions extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Вопросы';
    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay($scopes = null)
    {
        $columns = [
            AdminColumn::text('text', 'Вопрос'),
            AdminColumn::text('category.name', 'Категория вопроса'),
        ];

        $all_questions =  AdminDisplay::table()->setModelClass(Question::class)->setApply(function($query) {
            $query->latest();
        })->paginate(50)->setColumns($columns);

        $category1 =  AdminDisplay::table()->setApply(function($query) {
            $query->latest();
        })->paginate(50)->getScopes()->set('category1') ->setColumns($columns);

        $category2 =  AdminDisplay::table()->setApply(function($query) {
            $query->latest();
        })->paginate(50)->getScopes()->set('category2') ->setColumns($columns);

        $tabs = AdminDisplay::tabbed();

        $tabs->setElements([
            AdminDisplay::tab($all_questions)->setLabel('Все пользователи')->setBadge(Question::count()),
            AdminDisplay::tab($category1)->setLabel('Подтвержденные пользователи')->setBadge(Question::category1()->count()),
            AdminDisplay::tab($category2)->setLabel('Неподтвержденные пользователи')->setBadge(Question::category2()->count())
        ]);

        return $tabs;
    }

    public function onEdit($id)
    {

        $tabs = AdminDisplay::tabbed();

        $shop = AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('text', 'Вопрос')->required(),
                        AdminFormElement::select('category_question_id', 'Категория вопроса')->setModelForOptions(CategoryQuestion::class)->setDisplay('name')->required(),
                    ])
            ])
        );


        $tabs->appendTab($shop, 'Категория');


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
