@extends('layouts.app')

@section('title')
    @if(isset($product))
        Редактирование товара
    @else
        Новый товар
    @endif
@endsection

@section('content')

    <div class="settings-shop">
        <form action="@if(isset($product)){{ route('product.update') }}@else{{ route('product.save') }}@endif" method="post" class="settings-shop__form" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
                <input type="hidden" value="{{ $product->id }}" name="product_id">
            @endif
            <a href="{{ url()->previous() }}" class="button button_nav settings-shop__button_nav">Вернуться</a>
            <h3 class="settings-shop__title settings-shop__title_nav">
                @if(isset($product))
                    Редактирование товара
                @else
                    Новый товар
                @endif
            </h3>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Фотографии товара</span>
                    <span class="settings-shop__sub-t">Можно загрузить не более 8 фотографий товара, без водяных знаков и рекламных ссылок. Мы рекомендуем добавлять качественные фотографии с товаром крупным планом и с нескольких ракурсов. И помните, фотографии — это витрина вашего магазина.</span>
                </h3>
                <div class="settings-shop__gr">
                    <div class="goods-photo">
                        @if(isset($product))
                            @foreach($product->photos as $photo)
                                <div class="goods-photo__item" style="background-image: url('{{ asset($photo) }}')"></div>
                                <input type="hidden" name="loaded_photos[]" value="{{ $photo }}">
                            @endforeach
                        @else
                            <div class="goods-photo__item"></div>
                            <div class="goods-photo__item"></div>
                            <div class="goods-photo__item"></div>
                            <div class="goods-photo__item"></div>
                            <div class="goods-photo__item"></div>
                            <div class="goods-photo__item"></div>
                            <div class="goods-photo__item"></div>
                            <div class="goods-photo__item"></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name mid">
                    <span class="settings-shop__sub-t">Вы можете перетаскивать фотографии между собой, чтобы выстроить нужный порядок.</span>
                </h3>
                <div class="settings-shop__gr">
                    <input class="goods-photo-add" type="file" name="photos[]" multiple @if(!isset($product)) required @endif>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Название</span>
                    <span class="settings-shop__sub-t">Покупатели ждут от вас уникальное и привлекательное название, не более 60 символов.</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" class="settings-shop__textarea big" name="name" required placeholder="Введите название товара">@if(isset($product)){{ $product->name }}@endif</textarea>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Описание товара</span>
                    <span class="settings-shop__sub-t">Описание, не более 1 500 символов. Не забывайте, что, помимо вдохновляющего текста, важно следить и за русским языком.</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" class="settings-shop__textarea big" name="description" required placeholder="Подробно опишите все детали товара, его особенности и отличия">@if(isset($product)){{ $product->description }}@endif</textarea>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Состав</span>
                    <span class="settings-shop__sub-t">Перечислите через запятую из каких материалов сделан товар.</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" class="settings-shop__textarea big" name="composition" required placeholder="Например: металл, кожа, дерево и т.д.">@if(isset($product)){{ $product->composition }}@endif</textarea>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Стоимость</span>
                    <span class="settings-shop__sub-t">Вы можете указать скидку на товар только через 30 дней после последнего редактирования цены</span>
                </h3>
                <div class="settings-shop__gr">
                    <div class="price-n-discount">
                        <div class="price-n-discount__value">
                            <span class="inp-text inp-text_edit inp-text_readonly" contenteditable="true" data-maxlength="5">
                                @if(isset($product))
                                    {{ $product->price }}
                                @else
                                    0
                                @endif
                                <input type="hidden" name="price" required  value="@if(isset($product)) {{ $product->price }} @else 0 @endif">
                            </span>
                            ₽
                        </div>
                        <h3 class="settings-shop__name">
                            <span class="settings-shop__s-t">Скидка на товар</span>
                            <span class="settings-shop__sub-t">Вы сможете сделать скидку через 30 дней</span>
                        </h3>
                        <div class="price-n-discount__value disabled">
                            <span class="inp-text inp-text_edit inp-text_readonly" contenteditable="false" data-maxlength="5">
                                @if(isset($product))
                                    {{ $product->sale_price }}
                                @else
                                    0
                                @endif
                                <input type="hidden" name="sale_price" value="@if(isset($product)) {{ $product->sale_price }} @else 0 @endif">
                            </span>
                            ₽
                        </div>
                    </div>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
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
                                $product_delivery = null;
                                if (isset($product_deliveries) and $product_deliveries->find($delivery->id)) $product_delivery = $product_deliveries->find($delivery->id);
                            @endphp
                            <tr @if(empty($product_delivery)) class="disabled" @endif>
                                <td class="delivery__check">
                                    <input type="checkbox" @if($delivery->name == "Самовывоз") id="sm" @else id="pr" @endif  name="delivery[]" value="{{ $delivery->id }}" class="delivery__checkbox" @if(!empty($product_delivery)) checked @endif>
                                </td>
                                <td class="delivery__label">
                                    <label for="pr">{{ $delivery->name }}</label>
                                </td>
                                <td class="delivery__price">
                                    <input type="text" class="delivery__price-value" name="delivery_price[]" maxlength="6" value="@if(!empty($product_delivery)){{ $product_delivery->pivot->price }} @else 0 @endif"  @if(empty($product_delivery)) disabled @endif>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="delivery__address" colspan="3">
                                <textarea class="settings-shop__textarea @if(!isset($product)) hidden @endif" name="address" id="sm-textarea" cols="30" rows="2" placeholder="Укажите место самовывоза (город, адрес, комментарии)">@if(isset($product)){{ $product->address }}@endif</textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Категория товара</span>
                    <span class="settings-shop__sub-t">Выберите категорию товара.</span>
                </h3>
                <div class="settings-shop__gr">
                    <select data-placeholder="Выберите необходимую категорию" class="select" name="category_id" id="">
                        <option value="" disabled>Выберите необходимую категорию</option>
                        @foreach($categories as $category)
                            <option @if(isset($product_category) and $product_category->id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Количество товара</span>
                    <span class="settings-shop__sub-t">Какое количество товара вы можете продать.</span>
                </h3>
                <div class="settings-shop__gr mid">
                    <div class="quantity">
                        <div class="quantity__quant">
                            @if(isset($product) and $product->qty)
                                <input id="quant-val" type="number" class="input-num" value="{{ $product->qty }}" min="1" name="qty">
                            @elseif(isset($product) and !$product->qty)
                                <input id="quant-val" type="number" class="input-num" value="" min="1" name="qty" disabled>
                            @else
                                <input id="quant-val" type="number" class="input-num" value="1" min="1" name="qty" disabled>
                            @endif
                        </div>
                        <div class="quantity__any">
                            <input id="any" class="checkbox" type="checkbox" value="" name="qty_null" @if(isset($product) and !$product->qty) checked @endif>
                            <label for="any">Любое количество</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Сроки отправления</span>
                    <span class="settings-shop__sub-t">Когда вы сможете отправить товар? <br><br>Укажите, какой срок необходим для изготовления и отправки товара.</span>
                </h3>
                <div class="settings-shop__gr">
                    <select data-placeholder="Выбрать" class="select" name="term_dispatch_id" id="">
                        <option value="" disabled>Выбрать</option>
                        @foreach($term_dispatches as $dispatch)
                            <option @if(isset($product_term_dispatch) and $product_term_dispatch->id == $dispatch->id) selected @endif value="{{ $dispatch->id }}">{{ $dispatch->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Цвет товара</span>
                    <span class="settings-shop__sub-t">Выберите цвет товара.</span>
                </h3>
                <div class="settings-shop__gr">
                    <select data-placeholder="" class="multiselect color-item" name="color[]" id="" multiple size="4">
                        <option value="" disabled>Выбрать</option>
                        @foreach($colors as $color)
                            <option @if(isset($product_colors) and in_array($color->id, $product_colors)) selected @endif value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="center">
                @if(isset($product))
                    <input class="button" type="submit" value="Сохранить">
                @else
                    <input class="button" type="submit" value="Добавить товар">
                @endif
            </div>
        </form>
    </div>

@endsection
