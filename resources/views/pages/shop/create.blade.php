@extends('layouts.app')

@section('title') Создание магазина @endsection

@section('content')
    <div class="settings-shop">
        <form action="{{ route('shop.save') }}" class="settings-shop__form" method="post" enctype="multipart/form-data">
            @csrf
            <h3 class="settings-shop__title">Настройки магазина</h3>
            <div class="settings-shop__banner">
                <input type="file" class="settings-shop__logo" name="logo" required>
                <input type="file" class="settings-shop__obloj" name="cover" required>
                <input type="text" class="settings-shop__title-f" value="введите название магазина" name="name" required>
                <input type="text" class="settings-shop__subtitle" value="Добавьте краткое описание о вашем магазине" name="description_preview" required>
                <input type="text" class="settings-shop__city" value="Укажите город" name="city" required>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">О магазине</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" name="description" class="settings-shop__textarea big" placeholder="Расскажите подробнее о вашем магазине, особенностях товара и историю создания бренда"></textarea>
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Условия возврата</span>
                    <span class="settings-shop__sub-t">Вы можете изменить стандартный текст о возврате товара или оставить его без изменений</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" name="return_conditions" class="settings-shop__textarea big">Возврат товара надлежащего качества возможен в течение 14 дней, при сохранении его товарного вида (упаковка, пломбы, ярлыки) и потребительских свойств</textarea>
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Способы доставки</span>
                    <span class="settings-shop__sub-t">Выберите удобные способы доставки и укажите стоимость каждого</span>
                </h3>
                <div class="settings-shop__gr">
                    <table class="delivery">
                        <tr>
                            <th></th>
                            <th>Способ доставки</th>
                            <th>Стоимость доставки, ₽</th>
                        </tr>
                        @foreach($deliveries as $delivery)
                            <tr class="disabled">
                                <td class="delivery__check"><input type="checkbox" id="pr" name="delivery[]" value="{{ $delivery->id }}" class="delivery__checkbox"></td>
                                <td class="delivery__label"><label for="pr">{{ $delivery->name }}</label></td>
                                <td class="delivery__price"><input type="text" class="delivery__price-value" name="delivery_cost[]" maxlength="6" value="0" disabled></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="delivery__address" colspan="3">
                                <textarea class="settings-shop__textarea hidden" name="address" id="sm-textarea" cols="30" rows="2" placeholder="Укажите место самовывоза (город, адрес, комментарии)"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Мастер</span>
                    <span class="settings-shop__sub-t">Мастер — лицо вашего магазина. Мастер отвечает на вопросы пользователей о товаре, сроках доставки и условиях работы.</span>
                </h3>
                <div class="settings-shop__gr">
                    <input type="file" required name="master_logo" class="settings-shop__logo master-logo">
                    <input type="text" required name="master_name" class="settings-shop__mast-name" value="Введите ваше имя">
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Номер телефона</span>
                    <span class="settings-shop__sub-t">Номер телефона понадобится для уведомлений и решений возникших споров</span>
                </h3>
                <div class="settings-shop__gr">
                    <input type="text" required name="master_phone" class="text-form settings-shop__tel" placeholder="+7 (_ _ _ _">
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Ссылка на магазин</span>
                    <span class="settings-shop__sub-t">Адрес вашего магазина уникальный и закрепляется за вами навсегда</span>
                </h3>
                <div class="settings-shop__gr">
                    <span class="settings-shop__domain">{{ env('APP_URL') }}/shop/</span><input type="text" required name="slug" class="settings-shop__ss" placeholder="название_вашего_магазина">
                </div>
            </div>
            <div class="center">
                <input class="button" type="submit" value="Сохранить">
            </div>
        </form>
@endsection