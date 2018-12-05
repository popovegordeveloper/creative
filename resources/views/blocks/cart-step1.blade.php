<div class="lk__content lk__content_active step1">
    <h3 class="my-items__title">Корзина</h3>
    @if(\Gloudemans\Shoppingcart\Facades\Cart::count())
        <p class="js-cart-step1-desc">Проверьте выбранные товары, их количество и выберите желаемый способ доставки</p>

        <div class="cart cart--column">
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                <div class="cart-item">
                    <div class="cart-item__shop">
                        <a href="{{ route('shop.show', $product->model->shop->slug) }}"><div class="cart-item__shop-image" style="background-image: url('{{ asset($product->model->shop->logo) }}')"></div></a>
                        <a href="{{ route('shop.show', $product->model->shop->slug) }}"><span class="cart-item__shop-title">{{$product->model->shop->name}}</span></a>
                    </div>
                    <div class="cart-item__data">
                        <div class="cart-item__data sub-data">
                            <div style="display: flex">
                                <a href="{{ route('product.show', $product->model) }}"><div class="cart-item__image" style="background-image: url('{{ asset($product->model->photos[0]) }}')"></div></a>
                                <div class="cart-item__column">
                                    <a href="{{ route('product.show', $product->model) }}"><span class="cart-item_title">{{$product->model->name}}</span></a>
                                    <a class="cart-item__delete-link js-cart-remove-item" href="{{ route('cart.delete') }}" data-row="{{ $product->rowId }}">Удалить товар</a>
                                </div>
                            </div>

                            {{--<div class="cart-item__column cart-item__column--center">--}}
                                {{--<input id="quant-val" type="number" class="input-num js-add-from-cart" min="1" data-row="{{ $product->rowId }}" data-product="{{ $product->model->id }}" value="{{ $product->qty }}" name="qty">--}}
                                {{--<div class="info-i__form">--}}
                                    {{--@php $colors = $product->model->colors; @endphp--}}
                                    {{--@if($colors->count())--}}
                                        {{--<select name="color_id" id="" class="info-i__select">--}}
                                            {{--@foreach($colors as $color)--}}
                                                {{--<option value="" >{{ $color->name }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>

                        <div>
                            <span class="cart-item__price">{{ $product->price * $product->qty }} ₽</span>
                        </div>
                    </div>
                    <div class="cart-item__data">
                        @php $deliveries = $product->model->shop->deliveries; @endphp
                        @if($deliveries->count())
                            <div class="cart-item__data sub-data"
                                 style="justify-content: flex-start;margin-top: 35px;align-items: center;">
                                <span class="cart-item__delivery">Способ доставки</span>
                                <div class="info-i__form">
                                    <select name="delivery_id" id="" class="info-i__select js-item-delivery">
                                        @foreach($deliveries as $delivery)
                                            <option data-cost="{{ $delivery->pivot->price }}"
                                                    value="">{{ $delivery->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="cart-item__delivery-price">
                                <span class="cart-item__price js-item-price-delivery">{{ $deliveries->first()->pivot->price }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="cart__total js-cart-total">
                <span class="cart__total-title">Итого:</span>
                <span class="js-total-price">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }} ₽</span>
            </div>

        </div>

        <div style="display: flex;justify-content: center;" class="js-cart-sep1-buttons">
            <a href="" id="js-back-step2" class="button">Далее</a>
        </div>
    @else
        <p>На данный момент товары отсутствуют</p>
    @endif
</div>