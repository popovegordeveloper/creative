<div class="lk__content @if($section == 'favorites') lk__content_active @endif">
    <div class="my-items">
        @if($user->favorite->count())
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
                        <a href="{{ route('product.show', $favorite->id) }}" class="my-card__title">{{ $favorite->name }}</a>
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
        @else
            <div class="my-items-empty">
                <img src="{{ asset('img/box.jpg') }}" alt="" class="my-items-empty__img">
                <h3 class="my-items-empty__title">Избранное</h3>
                <span class="my-items-empty__subtitle">Пока нет ни одного избранного товара</span>
            </div>
        @endif
    </div>
</div>
