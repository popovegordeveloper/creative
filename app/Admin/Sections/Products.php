<?php

namespace App\Admin\Models;

use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Shop;
use App\Models\TermDispatch;
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

    public function onDisplay($scopes = null)
    {

        $display = AdminDisplay::datatables()
            ->setColumns([
                AdminColumn::text('id', 'ID'),
                AdminColumn::image('main_photo', 'Главная фотография'),
                AdminColumn::text('name', 'Название'),
                AdminColumn::text('composition', 'Состав'),
                AdminColumn::text('price', 'Цена'),
                AdminColumn::text('sale_price', 'Скидка'),
                AdminColumn::text('qty', 'Количество'),
                AdminColumn::text('category.name', 'Категория'),
                AdminColumn::relatedLink('shop.name', 'Магазин'),
                AdminColumn::text('termDispatch.name', 'Время доставки'),
                AdminColumn::text('viewed', 'Просмотры'),
                AdminColumnEditable::checkbox('is_checked', 'Да', 'Нет')->setLabel('Проверенный'),
            ])->paginate(10);

        if($scopes && $scopes[0] === 'shop_id')
            $display->setApply(function ($query) use ($scopes){ return $query->whereShopId($scopes[1]); });

        return $display;
    }

    public function onEdit($id)
    {

        $tabs = AdminDisplay::tabbed();

        $shop = AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()->addColumn([
                    AdminFormElement::images('photos', 'Фотографии')->required(),
                ]),
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('name', 'Название')->required(),
                        AdminFormElement::select('shop_id', 'Магазин')->setModelForOptions(Shop::class)->setDisplay('name')->required(),
                        AdminFormElement::textarea('composition', 'Состав')->required(),
                        AdminFormElement::text('size', 'Размер'),
                        AdminFormElement::text('weight', 'Вес'),
                    ])
                    ->addColumn([
                        AdminFormElement::select('category_id', 'Категория')->setModelForOptions(Category::class)->setDisplay('full_name')->required(),
                        AdminFormElement::number('sale_price', 'Сумма скидки'),
                        AdminFormElement::textarea('description', 'Описание')->required(),
                        AdminFormElement::text('season', 'Сезон'),
                    ])
                    ->addColumn([
                        AdminFormElement::number('price', 'Цена')->required(),
                        AdminFormElement::select('term_dispatch_id', 'Время доставки')->setModelForOptions(TermDispatch::class)->setDisplay('name')->required(),
                        AdminFormElement::number('qty', 'Количество'),
                        AdminFormElement::number('viewed', 'Просмотры'),
                        AdminFormElement::text('address', 'Адрес доставки'),
                        AdminFormElement::checkbox('is_checked', 'Проверенный'),
                        AdminFormElement::text('style', 'Стиль'),
                    ]),
            ])
        );


        $tabs->appendTab($shop, 'Товар');


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
