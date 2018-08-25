<div class="header__topbar">
    <div class="container">
        <div class="header__topbar-wrapper ">
            <!--<div class="city"><span class="city__you">Ваш город:</span> <a href="" class="city__name">Казань</a></div>-->
            <ul class="login">
                <!--<li class="login__item"><a href="" class="login__link">Войти</a></li>-->

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="login__item login__item_margin"><a href="" class="login__link login__link_prof">Мой профиль</a></li>
                    <li class="login__item login__item_modal">
                        <ul class="modal-header">
                            <li><a href="" class="modal-header-link">Мои товары</a></li>
                            <li><a href="" class="modal-header-link">Мои финансы</a></li>
                            <li><a href="" class="modal-header-link">Сообщения</a></li>
                            <li><a href="" class="modal-header-link">Избранное</a></li>
                            <li><a href="" class="modal-header-link">Найстройки</a></li>
                            <li><a href="{{ route('logout') }}" class="modal-header-link">Выйти</a></li>
                        </ul>
                    </li>
                @else
                    <li class="login__item"><a href="/login" class="login__link">Войти</a></li>
                    <li class="login__item login__item_margin"><a href="/register" class="login__link">Регистрация</a></li>
                @endif

                <li class="login__item login__item_corzina">
                    <a href="" class="login__link login__link_shop"><span class="login__link_icon"></span> <span class="login__shop-items">2</span></a>
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
                </li>

            </ul>
        </div>
    </div>
</div>