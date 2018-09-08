@extends('layouts.app')

@section('title')
    @if(isset($shop))
        Настройки магазина
    @else
        Создание магазина
    @endif
@endsection

@section('content')
    <div class="settings-shop">
        <form action="@if(isset($shop)){{ route('shop.update') }}@else{{ route('shop.save') }}@endif" class="settings-shop__form" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($shop))
                <input type="hidden" name="cover_exist" value="{{ $shop->cover }}">
                <input type="hidden" name="logo_exist" value="{{ $shop->logo }}">
                <input type="hidden" name="master_logo_exist" value="{{ $shop->master_logo }}">
            @endif
            <h3 class="settings-shop__title">
                @if(isset($shop))
                    Настройки магазина
                @else
                    Создание магазина
                @endif
            </h3>
            <div class="settings-shop__banner" id="shopBanner" @if(isset($shop)) style="background-image: url('{{ asset($shop->cover) }}')" @endif>
                <input type="file" class="settings-shop__logo" id="shopLogo" name="logo" @if(!isset($shop)) required @endif>
                <input type="file" class="settings-shop__obloj" name="cover" @if(!isset($shop)) required @endif>
                @if(isset($shop))
                    <input type="text" class="settings-shop__title-f" value="{{ $shop->name }}" name="name" required>
                @else
                    <input type="text" class="settings-shop__title-f" value="" placeholder="введите название магазина" name="name" required>
                @endif
                @if(isset($shop))
                    <input type="text" class="settings-shop__subtitle" value="{{ $shop->description_preview }}" name="description_preview" required>
                @else
                    <input type="text" class="settings-shop__subtitle" value="" placeholder="Добавьте краткое описание о вашем магазине" name="description_preview" required>
                @endif
                @if(isset($shop))
                    <input type="text" class="settings-shop__city" value="{{ $shop->city }}" name="city" required>
                @else
                    <input type="text" class="settings-shop__city" value="" placeholder="Укажите город" name="city" required>
                @endif
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">О магазине</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" name="description" class="settings-shop__textarea big" placeholder="Расскажите подробнее о вашем магазине, особенностях товара и историю создания бренда">@if(isset($shop)){{ $shop->description }}@endif</textarea>
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Условия возврата</span>
                    <span class="settings-shop__sub-t">Вы можете изменить стандартный текст о возврате товара или оставить его без изменений</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" name="return_conditions" class="settings-shop__textarea big">@if(isset($shop)){{ $shop->return_conditions }} @else Возврат товара надлежащего качества возможен в течение 14 дней, при сохранении его товарного вида (упаковка, пломбы, ярлыки) и потребительских свойств @endif</textarea>
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
                            @php
                                $shop_delivery = null;
                                if (isset($shop_deliveries) and $shop_deliveries->find($delivery->id)) $shop_delivery = $shop_deliveries->find($delivery->id);
                            @endphp
                            <tr @if(empty($shop_delivery)) class="disabled" @endif>
                                <td class="delivery__check">
                                    <input type="checkbox" @if($delivery->name == "Самовывоз") id="sm" @else id="pr" @endif  name="delivery[]" value="{{ $delivery->id }}" class="delivery__checkbox" @if(!empty($shop_delivery)) checked @endif>
                                </td>
                                <td class="delivery__label">
                                    <label for="pr">{{ $delivery->name }}</label>
                                </td>
                                <td class="delivery__price">
                                    <input type="text" class="delivery__price-value" name="delivery_cost[]" maxlength="6" value="@if(!empty($shop_delivery)){{ $shop_delivery->pivot->price }} @else 0 @endif"  @if(empty($shop_delivery)) disabled @endif>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="delivery__address" colspan="3">
                                <textarea class="settings-shop__textarea hidden" name="address" id="sm-textarea" cols="30" rows="2" placeholder="Укажите место самовывоза (город, адрес, комментарии)">@if(isset($shop)){{ $shop->address }}@endif</textarea>
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
                    <input type="file" @if(!isset($shop)) required @endif name="master_logo" class="settings-shop__logo master-logo" id="masterLogo">
                    <input type="text" required name="master_name" class="settings-shop__mast-name" value="@if(isset($shop)){{ $shop->master_name }}@else Введите ваше имя @endif">
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Номер телефона</span>
                    <span class="settings-shop__sub-t">Номер телефона понадобится для уведомлений и решений возникших споров</span>
                </h3>
                <div class="settings-shop__gr">
                    <input type="text" required name="master_phone" class="text-form settings-shop__tel" placeholder="+7 (_ _ _ _" @if(isset($shop)) value="{{ $shop->master_phone }}" @endif>
                </div>
            </div>
            <div class="settings-shop__group">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Ссылка на магазин</span>
                    <span class="settings-shop__sub-t">Адрес вашего магазина уникальный и закрепляется за вами навсегда</span>
                </h3>
                <div class="settings-shop__gr">
                    <span class="settings-shop__domain">{{ env('APP_URL') }}/shop/</span><input type="text" required name="slug" class="settings-shop__ss" placeholder="название_вашего_магазина" @if(isset($shop)) value="{{ $shop->slug }}" @endif>
                </div>
            </div>
            <div class="center">
                <input class="button" type="submit" value="Сохранить">
            </div>
        </form>
@endsection
