<div class="lk__content @if($section == 'favorites') lk__content_active @endif">
    <div class="my-items">
        <div class="my-items__top">
            <h3 class="my-items__title">Избранное</h3>
        </div>
        <div class="my-items__body">
            @foreach($user->favorite as $favorite)
                <div class="my-card">
                    <div class="my-card__pic">
                        <img src="{{ $favorite->photos[0] }}" alt="" class="my-card__img">
                        <div class="my-card__ower"></div>
                        <a href="" class="my-card__del my-card__del_f js-del-favorite">
                            <form action="{{ route('product.delete_favorite') }}" method="post" style="display: none">
                                @csrf
                                <input type="text" name="user_id" value="{{ auth()->id() }}">
                                <input type="text" name="product_id" value="{{ $favorite->id }}">
                            </form>
                        </a>
                    </div>
                    <a href="" class="my-card__title">{{ $favorite->name }}</a>
                    <div class="my-card__bottom">
                        <span class="my-card__cash">{{ $favorite->getPrice() }} ₽</span>
                        @if($favorite->sale_price)
                            <span class="my-card__old-cash">{{ $favorite->price }} ₽</span>
                        @endif
                        <span class="my-card__views">{{ $favorite->viewed }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
