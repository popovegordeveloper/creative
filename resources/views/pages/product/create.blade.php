@extends('layouts.app')

@section('title') Новый товар @endsection

@section('content')

    <div class="settings-shop">
        <form action="" class="settings-shop__form">
            <a href="{{ url()->previous() }}" class="button button_nav settings-shop__button_nav">Вернуться</a>
            <h3 class="settings-shop__title settings-shop__title_nav">Новый товар</h3>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Фотографии товара</span>
                    <span class="settings-shop__sub-t">Можно загрузить не более 8 фотографий товара, без водяных знаков и рекламных ссылок. Мы рекомендуем добавлять качественные фотографии с товаром крупным планом и с нескольких ракурсов. И помните, фотографии — это витрина вашего магазина.</span>
                </h3>
                <div class="settings-shop__gr">
                    <div class="goods-photo">
                        <div class="goods-photo__item"></div>
                        <div class="goods-photo__item"></div>
                        <div class="goods-photo__item"></div>
                        <div class="goods-photo__item"></div>
                        <div class="goods-photo__item"></div>
                        <div class="goods-photo__item"></div>
                        <div class="goods-photo__item"></div>
                        <div class="goods-photo__item"></div>
                    </div>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name mid">
                    <span class="settings-shop__sub-t">Вы можете перетаскивать фотографии между собой, чтобы выстроить нужный порядок.</span>
                </h3>
                <div class="settings-shop__gr">
                    <input class="goods-photo-add" type="file" value="" name="">
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Название</span>
                    <span class="settings-shop__sub-t">Покупатели ждут от вас уникальное и привлекательное название, не более 60 символов.</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" class="settings-shop__textarea big" placeholder="Введите название товара"></textarea>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Описание товара</span>
                    <span class="settings-shop__sub-t">Описание, не более 1 500 символов. Не забывайте, что, помимо вдохновляющего текста, важно следить и за русским языком.</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" class="settings-shop__textarea big" placeholder="Подробно опишите все детали товара, его особенности и отличия"></textarea>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Состав</span>
                    <span class="settings-shop__sub-t">Перечислите через запятую из каких материалов сделан товар.</span>
                </h3>
                <div class="settings-shop__gr">
                    <textarea type="text" class="settings-shop__textarea big" placeholder="Например: металл, кожа, дерево и т.д."></textarea>
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
                            <span class="inp-text inp-text_edit inp-text_readonly" contenteditable="true" data-maxlength="5">0<input type="hidden" name="" value=""></span> ₽
                        </div>
                        <h3 class="settings-shop__name">
                            <span class="settings-shop__s-t">Скидка на товар</span>
                            <span class="settings-shop__sub-t">Вы сможете сделать скидку через 30 дней</span>
                        </h3>
                        <div class="price-n-discount__value disabled">
                            <span class="inp-text inp-text_edit inp-text_readonly" contenteditable="false" data-maxlength="5">0<input type="hidden" name="" value=""></span> ₽
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
                        <tr class="disabled">
                            <td class="delivery__check"><input type="checkbox" id="pr" class="delivery__checkbox"></td>
                            <td class="delivery__label"><label for="pr">Почта России</label></td>
                            <td class="delivery__price"><input type="text" class="delivery__price-value" maxlength="6" value="0" disabled></td>
                        </tr>
                        <tr class="disabled">
                            <td class="delivery__check"><input type="checkbox" id="kr" class="delivery__checkbox"></td>
                            <td class="delivery__label"><label for="kr">Курьерская служба</label></td>
                            <td class="delivery__price"><input type="text" class="delivery__price-value" maxlength="6" value="0" disabled></td>
                        </tr>
                        <tr class="disabled">
                            <td class="delivery__check"><input type="checkbox" id="sm" class="delivery__checkbox"></td>
                            <td class="delivery__label"><label for="sm">Самовывоз</label></td>
                            <td class="delivery__price"><input type="text" class="delivery__price-value" maxlength="6" value="0" disabled></td>
                        </tr>
                        <tr>
                            <td class="delivery__address" colspan="3">
                                <textarea class="settings-shop__textarea hidden" name="" id="sm-textarea" cols="30" rows="2" placeholder="Укажите место самовывоза (город, адрес, комментарии)"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Категория товара</span>
                    <span class="settings-shop__sub-t">Перечислите через запятую из каких материалов сделан товар.</span>
                </h3>
                <div class="settings-shop__gr">
                    <select data-placeholder="Выберите необходимую категорию" class="select" name="" id="">
                        <option value="" disabled>Выберите необходимую категорию</option>
                        <option value="">Товаря для дома</option>
                        <option value="">Одежда</option>
                        <option value="">Игрушки</option>
                        <option value="">Одежда</option>
                        <option value="">Игрушки</option>
                        <option value="">Одежда</option>
                        <option value="">Игрушки</option>
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
                        <div class="quantity__quant"><input id="quant-val" type="number" class="input-num" value="1" min="1"></div>
                        <div class="quantity__any"><input id="any" class="checkbox" type="checkbox" value="" name=""><label for="any">Любое количество</label></div>
                    </div>
                </div>
            </div>
            <div class="settings-shop__group settings-shop__group_type2">
                <h3 class="settings-shop__name">
                    <span class="settings-shop__s-t">Сроки отправления</span>
                    <span class="settings-shop__sub-t">Когда вы сможете отправить товар? <br><br>Укажите, какой срок необходим для изготовления и отправки товара.</span>
                </h3>
                <div class="settings-shop__gr">
                    <select data-placeholder="Выбрать" class="select" name="" id="">
                        <option value="" disabled>Выбрать</option>
                        <option value="">Товаря для дома</option>
                        <option value="">Одежда</option>
                        <option value="">Игрушки</option>
                        <option value="">Одежда</option>
                        <option value="">Игрушки</option>
                        <option value="">Одежда</option>
                        <option value="">Игрушки</option>
                    </select>
                </div>
            </div>
            <div class="center">
                <input class="button" type="submit" value="Добавить товар">
            </div>
        </form>
    </div>

@endsection
