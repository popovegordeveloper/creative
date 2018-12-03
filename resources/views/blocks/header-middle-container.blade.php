<div class="new-header__main">
    <div class="menu-row container">
        <div class="logo">
            <img src="/img/logo-icon.svg" alt="" class="logo__img">
            <h1 class="logo__title">Creative Expo</h1>
            <a href="/" class="logo__link"></a>
        </div>

        <a href="{{ route('catalog') }}?sale=true" class="two-btn__link">Распродажа</a>


        <form action="{{ route('search') }}" class="search" method="post">
            @csrf
            <input type="text" class="search__input" name="name">
            <button class="search__button"></button>
        </form>

        <div class="header-mobile-container">
            <div class="two-btn">
                @auth
                    @if(auth()->user()->hasRole('Seller'))
                        <a href="{{ route('shop.show', auth()->user()->shop->slug) }}" class="two-btn__btn">Мой магазин</a>
                    @else
                        <a href="{{ route('shop.create') }}" class="two-btn__btn">Создать магазин</a>
                    @endif
                @endauth
            </div>

            <div class="btn-basked btn-basked--otstup">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="btn-basked__items js-cart-count">{{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}</span>
            </div>
            <div class="shop-box js-cart-small">
                @include('blocks.cart-small')
            </div>
        </div>

        @if(Route::currentRouteName() == 'catalog' and isset($sub_categories))
            <button class="cmn-toggle-switch cmn-toggle-switch__htx">
                <span>toggle menu</span>
            </button>
        @endif
    </div>
    @include('blocks.header-categories-container')
</div>
