<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Conversations extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Диалоги';
        $this->icon = 'fa fa-comments';
    }

    public function isCreatable()
    {
        return false;
    }

    public function isEditable(Model $model)
    {
        return false;
    }

    public function onDisplay()
    {

        return AdminDisplay::datatables()
            ->setApply(function ($query){
                return $query->where('user2_id', 1);
            })
            ->setColumns([
                AdminColumn::custom('Пользователь', function (\Illuminate\Database\Eloquent\Model $model){
                        $user = User::find($model->user1_id);
                        return "<a href='" . route('admin.messages', $model->id) . "'>$user->full_name</a>";
                })
            ])->paginate(10);
    }

    public function isDeletable(Model $model)
    {
        return false;
    }
}
