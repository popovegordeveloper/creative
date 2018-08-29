<div class="new-header__main">
    <div class="menu-row container">
        <div class="logo">
            <img src="/img/logo-icon.svg" alt="" class="logo__img">
            <h1 class="logo__title">Creative Expo</h1>
            <a href="/" class="logo__link"></a></div>
        <form action="" class="search">
            <input type="text" class="search__input">
            <button class="search__button"></button>
        </form>
        <div class="two-btn">
            <a href="" class="two-btn__link">Распродажа</a>
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
            <span class="btn-basked__items">2</span>
            <div class="shop-box">
                <div class="shop-box__top">
                    <span>Корзина</span>
                    <a href="">Очистить все</a>
                </div>
                <div class="shop-box__content">
                    <div class="sb-i">
                        <div class="sb-i__body">
                            <div class="sb-i__img-w">
                                <img src="img/sb-i.png" alt="" class="sb-i__img">
                                <a href="" class="sb-i__close"></a>
                            </div>
                            <div class="sb-i__nb">
                                <a href="" class="sb-i__title">ГАЛСТУК-БАБОЧКА BOWTIE LEATHER STRAP</a>
                                <a href="" class="sb-i__magazin">TO BE MAGIC</a>
                            </div>
                        </div>
                        <div class="sb-i__bottom">
                            <span class="sb-i__col-vo">Кол: 1 шт.</span>
                            <span class="sb-i__cash">990 ₽</span>
                        </div>
                    </div>
                    <div class="sb-i">
                        <div class="sb-i__body">
                            <div class="sb-i__img-w">
                                <img src="img/sb-i.png" alt="" class="sb-i__img">
                                <a href="" class="sb-i__close"></a>
                            </div>
                            <div class="sb-i__nb">
                                <a href="" class="sb-i__title">ГАЛСТУК-БАБОЧКА BOWTIE LEATHER STRAP</a>
                                <a href="" class="sb-i__magazin">TO BE MAGIC</a>
                            </div>
                        </div>
                        <div class="sb-i__bottom">
                            <span class="sb-i__col-vo">Кол: 1 шт.</span>
                            <span class="sb-i__cash">990 ₽</span>
                        </div>
                    </div>
                    <div class="sb-i">
                        <div class="sb-i__body">
                            <div class="sb-i__img-w">
                                <img src="img/sb-i.png" alt="" class="sb-i__img">
                                <a href="" class="sb-i__close"></a>
                            </div>
                            <div class="sb-i__nb">
                                <a href="" class="sb-i__title">ГАЛСТУК-БАБОЧКА BOWTIE LEATHER STRAP</a>
                                <a href="" class="sb-i__magazin">TO BE MAGIC</a>
                            </div>
                        </div>
                        <div class="sb-i__bottom">
                            <span class="sb-i__col-vo">Кол: 1 шт.</span>
                            <span class="sb-i__cash">990 ₽</span>
                        </div>
                    </div>
                </div>

                <div class="shop-box__footer">
                    <div class="sb-f">
                        <div class="sb-f__top">
                            <span class="sb-f__text">Общая стоимость</span><span class="sb-f__cash">15 999 ₽ </span></div>
                        <div class="sb-f__f"><a href="" class="sb-f__button">Оформить покупку</a></div>
                    </div>
                </div>
            </div>
        </div>
        <button class="cmn-toggle-switch cmn-toggle-switch__htx">
            <span>toggle menu</span>
        </button>
    </div>
    @include('blocks.header-categories-container')
</div>
