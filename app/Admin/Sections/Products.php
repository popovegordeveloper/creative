<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Form\FormElements;

class Products extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Товары';
        $this->icon = 'fa fa-product-hunt';
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
                AdminColumn::text('composition', 'Состав'),
                AdminColumn::text('price', 'Цена'),
                AdminColumn::text('sale_price', 'Сумма скидки'),
                AdminColumn::text('qty', 'Количество'),
                AdminColumn::text('category.name', 'Категория'),
                AdminColumn::relatedLink('shop.name', 'Магазин'),
                AdminColumn::text('termDispatch.name', 'Время доставки'),
                AdminColumn::lists('deliveries.name', 'Способ доставки'),
            ])->paginate(10);
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
                        AdminFormElement::select('user_id', 'Пользователь')->setModelForOptions(User::class)->setDisplay('full_name')->required(),
                        AdminFormElement::image('logo', 'Лого')->required(),
                    ])
                    ->addColumn([
                        AdminFormElement::text('description_preview', 'Краткое описание')->required(),
                        AdminFormElement::textarea('return_conditions', 'Условия возврата'),
                        AdminFormElement::text('address', 'Адрес'),
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
