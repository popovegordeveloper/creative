<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Delivery;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class ShopDeliveries extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Способы доставки';
        $this->icon = 'fa fa-shopping-bag';
    }

    public function isCreatable()
    {
        return true;
    }

    public function onDisplay($scopes = null)
    {
        $display = AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                AdminColumn::text('delivery.name', 'Способ доставки'),
                AdminColumn::text('price', 'Стоимость'),
            ]);

        if($scopes && $scopes[0] === 'shop_id')
            $display->setApply(function ($query) use ($scopes){ return $query->whereShopId($scopes[1]); });

        return $display;

    }

    public function onEdit($id)
    {
        return AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::select('shop_id', 'Магазин')->setModelForOptions(Shop::class)->setDisplay('name')->required(),
                        AdminFormElement::select('delivery_id', 'Способ доставки')->setModelForOptions(Delivery::class)->setDisplay('name')->required(),
                        AdminFormElement::number('price', 'Стоимость')->required(),
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
