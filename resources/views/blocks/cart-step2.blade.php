@php $user = auth()->user(); @endphp

<div class="lk__content step2">
    <div class="cart">
        <div class="cart__column1">
            <h3 class="my-items__title title">Контактная информация</h3>
            <form action="">
                @csrf
                <div class="cart__row">
                    <div>
                        <label for="cart-name">Имя</label>
                        <input type="text" name="name" id="cart-name" @if($user) value="{{ $user->name }}" @endif>
                    </div>

                    <div>
                        <label for="cart-patronymic">Отчество</label>
                        <input type="text" name="patronymic" id="cart-patronymic" @if($user) value="{{ $user->patronymic }}" @endif>
                    </div>
                </div>

                <div class="cart__row">
                    <div>
                        <label for="cart-surname">Фамилия</label>
                        <input type="text" name="surname" id="cart-surname" @if($user) value="{{ $user->surname }}" @endif>
                    </div>

                    <div>
                        <label for="cart-phone">Контактный телефон</label>
                        <input type="text" name="phone" id="cart-phone" @if($user) value="{{ $user->phone }}" @endif>
                    </div>
                </div>

                <div class="cart__row">
                    <div>
                        <label for="cart-email">Эл. почта</label>
                        <input type="text" name="email" id="cart-email" @if($user) value="{{ $user->email }}" @endif>
                    </div>

                    <div>
                        <label for="cart-index">Индекс</label>
                        <input type="text" name="index" id="cart-index" @if($user) value="{{ $user->index }}" @endif>
                    </div>
                </div>

                <div class="cart__row">
                    <div>
                        <label for="cart-address">Адрес доставки</label>
                        <textarea type="text" name="address" id="cart-address">@if($user) {{ $user->address }} @endif</textarea>
                    </div>

                    <div>
                        <label for="cart-comment">Комментарий к заказу</label>
                        <textarea type="text" name="comment" id="cart-comment"></textarea>
                    </div>
                </div>

            </form>
        </div>
        <div class="cart__column2">
            <h3 class="my-items__title title">Итого:</h3>
            <div class="cart__row">
                <div><span>Товары:</span></div>
                <div><span class="big-text">1990₽</span></div>
            </div>
            <div class="cart__row">
                <div><span>Доставка:</span></div>
                <div><span class="big-text">350₽</span></div>
            </div>
            <div class="cart__row">
                <div><span>Общая стоимость:</span></div>
                <div><span class="big-text">15950₽</span></div>
            </div>
            <div class="cart__row">
                <div style="display: block">
                    <label for="cart-promo">Промокод</label>
                    <input type="text" name="promo" id="cart-promo">
                </div>
                <div style="display: block;align-self: flex-end;"><a class="button button_nav">Применить</a></div>
            </div>
            <div class="cart__row">
                <div><p>Нажимая на кнопку «Перейти к оплате», вы подтверждаете согласие с <a href="" style="color: #c36;text-decoration: underline;">офертой</a> для покупателей на сайте creativexpo.ru</p></div>
            </div>
        </div>
    </div>
    <div class="cart-step2__buttons" style="display: flex;justify-content: center;">
        <a href="" id="js-back-step1" class="button button_nav" style="margin-right: 50px;">Вернуться назад</a>
        <a href="" class="button">Перейти к оплате</a>
    </div>
    <p class="settings-shop__sub-t" style="text-align: center;">Вы будете перенаправлены на сторонний сервис Moneta.ru, где вы сможете выбрать удобный способ оплаты.</p>
</div>