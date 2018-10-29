


        <div class="shop-box__top">
            <span>Корзина</span>
            @if(\Gloudemans\Shoppingcart\Facades\Cart::count()) <a href="{{ route('cart.delete.all') }}" class="js-cart-delete-all">Очистить все</a> @endif
        </div>

        <div class="shop-box__content">
            @if(\Gloudemans\Shoppingcart\Facades\Cart::count())
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                    <div class="sb-i">
                        <div class="sb-i__body">
                            <div class="sb-i__img-w" style="background-image: url('{{ asset($product->model->photos[0]) }}')">
                                {{--<img src="{{ asset($product->model->photos[0]) }}" alt="" class="sb-i__img">--}}
                                <a href="{{ route('cart.delete') }}" data-row="{{ $product->rowId }}"
                                   class="sb-i__close js-remove-item-cart"></a>
                            </div>
                            <div class="sb-i__nb">
                                <a href="{{ route('product.show', $product->model) }}"
                                   style="display: block" class="sb-i__title">{{$product->model->name}}</a>
                                <a href="{{ route('shop.show', $product->model->shop->slug) }}"
                                   class="sb-i__magazin">{{$product->model->shop->name}}</a>
                            </div>
                        </div>
                        <div class="sb-i__bottom">
                            <span class="sb-i__col-vo">Кол: {{ $product->qty }} шт.</span>
                            <span class="sb-i__cash">{{$product->price * $product->qty}} ₽</span>
                        </div>
                    </div>
                @endforeach
            @else
                <span class="shop-box__message">На данный момент корзина пуста</span>
            @endif
        </div>

        @if(\Gloudemans\Shoppingcart\Facades\Cart::count())
            <div class="shop-box__footer">
                <div class="sb-f">
                    <div class="sb-f__top">
                        <span class="sb-f__text">Общая стоимость</span><span class="sb-f__cash">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }} ₽ </span></div>
                    <div class="sb-f__f">
                        <a href="{{ route('cart') }}" class="sb-f__button">Оформить покупку</a>
                    </div>
                </div>
            </div>
        @endif
