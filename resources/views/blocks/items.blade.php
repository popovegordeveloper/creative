@foreach($products as $product)
    @php $class = rand(0, 1); @endphp
    <div class="card @if(!$class) card_long @endif">
        <div class="card__img-w">
            {{--<img src="{{ asset($product->photos[0]) }}" alt="" class="card__img">--}}
            <div class="card__hover-w" style="background-image: url('{{ asset($product->photos[0]) }}')">
                <a href="{{ route('product.show', $product->id) }}" class="card__hover-link"></a>
                @auth
                    @php
                        $class = (isset($favorites) and in_array($product->id, $favorites)) ? 'fav-active' : '';
                        $url = (isset($favorites) and in_array($product->id, $favorites)) ? route('product.delete_favorite') : route('product.add_favorite');
                    @endphp
                    <a href="" class="card__like js-add-favorite {{ $class }}">
                        <form action="{{ $url }}" method="post" style="display: none">
                            @csrf
                            <input type="text" name="user_id" value="{{ auth()->id() }}">
                            <input type="text" name="product_id" value="{{ $product->id }}">
                        </form>
                    </a>
                @endauth
                <a href="{{ route('cart.add') }}" data-product="{{ $product->id }}" class="card__bay js-add-to-cart">В корзину</a>
                <a href="{{ route('product.show', $product->id) }}" class="card__more">Подробнее</a>
            </div>
        </div>
        <a href="{{ route('product.show', $product->id) }}" class="card__title">{{ $product->name }}</a>
        <a href="{{ route('shop.show', $product->shop->slug) }}" class="card__shopname">{{ $product->shop->name }}</a>
        <div>
        <span class="card__cash">{{ $product->getPrice() }}</span>
        @if($product->sale_price)
            <span class="info-i__soil" style="margin-left: 0">{{ $product->price }} ₽</span>
        @endif
        </div>
    </div>
@endforeach
