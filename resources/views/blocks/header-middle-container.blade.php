<div class="container">
    <div class="header__main">
        <div class="logo"><img src="{{ asset('img/logo-icon.svg') }}" alt="" class="logo__img"><h1 class="logo__title">Creative Expo</h1><a href="/" class="logo__link"></a></div>
        <form action="" class="search">
            <input type="text" class="search__input">
            <button class="search__button"></button>
        </form>
        <!--//меню при скролле-->
        <div class="header__razdel"><span></span></div>
        <ul class="create-shop">
            <li class="create-shop__item"><a href="" class="create-shop__link">Распродажа</a></li>
            @auth
                <li class="create-shop__item">
                    @if(auth()->user()->hasRole('Seller'))
                        <a href="{{ route('shop.show', auth()->user()->shop->slug) }}" class="create-shop__link create-shop__link_button">Мой магазин</a>
                    @else
                        <a href="{{ route('shop.create') }}" class="create-shop__link create-shop__link_button">Создать магазин</a>
                    @endif
                </li>
            @endauth
        </ul>
    </div>
</div>