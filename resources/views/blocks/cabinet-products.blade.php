@if($user->shop)
    <div class="lk__content  @if(!$section or $section == 'products') lk__content_active @endif">
        @if($user->shop->products->count())
            <div class="my-items">
                <div class="my-items__top">
                    <h3 class="my-items__title">Мои товары</h3>
                    <a href="{{ route('product.create') }}" class="my-items__button">Добавить товар</a></div>
                    <div class="my-items__body">
                        @foreach($user->shop->products as $product)
                            <div class="my-card">
                                <div class="my-card__pic">
                                    <img src="{{ asset($product->photos[0]) }}" alt="" class="my-card__img">
                                    <div class="my-card__ower"></div>
                                    <a href="{{ route('product.edit', $product->id) }}" class="my-card__edit"></a>
                                    <a href="" class="my-card__del js-del-product">
                                        <form action="{{ route('product.delete') }}" method="post" style="display: none">
                                            @csrf
                                            <input type="text" name="product_id" value="{{ $product->id }}">
                                        </form>
                                    </a>
                                </div>
                                <a href="{{ route('product.show', $product->id) }}" class="my-card__title">{{ $product->name }}</a>
                                <div class="my-card__bottom">
                                    <span class="my-card__cash">{{ $product->getPrice() }} ₽</span>
                                    @if($product->sale_price) <span class="my-card__old-cash">{{ $product->price }} ₽</span> @endif
                                    <span class="my-card__views">{{ $product->viewed }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        @else
            <div class="my-items-empty">
                <img src="{{ asset('img/box.jpg') }}" alt="" class="my-items-empty__img">
                <h3 class="my-items-empty__title">Мои товары</h3>
                <span class="my-items-empty__subtitle">Пока нет ни одного добавленного товара</span>
                <a href="{{ route('product.create') }}" class="my-items-empty__button">Добавить товар</a>
            </div>
        @endif
    </div>
@endif
