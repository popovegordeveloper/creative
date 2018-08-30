@foreach($products as $product)
    @php $class = rand(0, 1); @endphp
    <div class="card @if(!$class) card_long @endif">
        <div class="card__img-w">
            <img src="{{ asset($product->photos[0]) }}" alt="" class="card__img">
            <div class="card__hover-w">
                <a href="{{ route('product.show', $product->id) }}" class="card__hover-link"></a>
                @auth
                    @php
                        $class = ($favorites and in_array($product->id, $favorites)) ? 'fav-active' : '';
                        $url = ($favorites and in_array($product->id, $favorites)) ? route('product.delete_favorite') : route('product.add_favorite');
                    @endphp
                    <a href="" class="card__like js-add-favorite {{ $class }}">
                        <form action="{{ $url }}" method="post" style="display: none">
                            @csrf
                            <input type="text" name="user_id" value="{{ auth()->id() }}">
                            <input type="text" name="product_id" value="{{ $product->id }}">
                        </form>
                    </a>
                @endauth
                <a href="" class="card__bay">В корзину</a>
                <a href="{{ route('product.show', $product->id) }}" class="card__more">Подробнее</a>
            </div>
        </div>
        <a href="{{ route('product.show', $product->id) }}" class="card__title">{{ $product->name }}</a>
        <a href="{{ route('shop.show', $product->shop->slug) }}" class="card__shopname">{{ $product->shop->name }}</a>
        <span class="card__cash">{{ $product->getPrice() }}</span>
    </div>
@endforeach
