<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Shops extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Магазины';
        $this->icon = 'fa fa-shopping-bag';
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
                AdminColumn::text('description_preview', 'Краткое описание'),
                AdminColumn::text('city', 'Город'),
                AdminColumn::text('description', 'Описание'),
                AdminColumn::text('return_conditions', 'Условия возврата'),
                AdminColumn::text('slug', 'URL'),
                AdminColumn::image('logo', 'Лого'),
                AdminColumn::image('cover', 'Обложка'),
            ]);
    }

    public function onEdit($id)
    {

        $tabs = AdminDisplay::tabbed();

        $shop = AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Название')->required(),
                        AdminFormElement::textarea('description', 'Описание'),
                        AdminFormElement::image('logo', 'Лого')->required(),
                    ])
                    ->addColumn([
                        AdminFormElement::text('description_preview', 'Краткое описание')->required(),
                        AdminFormElement::textarea('return_conditions', 'Условия возврата'),
                        AdminFormElement::image('cover', 'Обложка')->required(),
                    ])
                    ->addColumn([
                        AdminFormElement::text('city', 'Город')->required(),
                        AdminFormElement::text('slug', 'URL')->required(),
                        AdminFormElement::text('master_name', 'Имя мастера')->required(),
                        AdminFormElement::number('master_phone', 'Телефон мастера')->required(),
                        AdminFormElement::image('master_logo', 'Лого мастера')->required(),
                    ])
            ])
        );

        $deliveries = \AdminSection::getModel(\App\Models\DeliveryShop::class)->fireDisplay(['scopes' => ['shop_id', $id]])->setParameter('shop_id', $id);

        $tabs->appendTab($shop, 'Магазин');
        $tabs->appendTab($deliveries, 'Способы доставки');


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
