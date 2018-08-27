@extends('layouts.app')

@section('title') Кабинет @endsection

@section('content')

    <div class="lk">
        <div class="lk__wrapper">
            <ul class="lk__tabs">
                <li class="lk__tab-item lk__tab-item_1 @if(!$section or $section == 'products') lk__tab-item_active @endif"><span class="lk__tab-link">Мои товары</span></li>
                <li class="lk__tab-item lk__tab-item_2 @if($section == 'finance') lk__tab-item_active @endif"><span class="lk__tab-link">Мои финансы</span></li>
                <li class="lk__tab-item lk__tab-item_3 @if($section == 'messages') lk__tab-item_active @endif"><span class="lk__tab-link">Сообщения</span></li>
                <li class="lk__tab-item lk__tab-item_4 @if($section == 'favorites') lk__tab-item_active @endif"><span class="lk__tab-link">Избранное</span></li>
                <li class="lk__tab-item lk__tab-item_5 @if($section == 'settings') lk__tab-item_active @endif"><span class="lk__tab-link">Настройки</span></li>
            </ul>
            <div class="lk__content  @if(!$section or $section == 'products') lk__content_active @endif">
                <div class="my-items">
                    <div class="my-items__top">
                        <h3 class="my-items__title">Мои товары</h3>
                        <a href="" class="my-items__button">Добавить товар</a></div>
                    <div class="my-items__body">
                        <div class="my-card">
                            <div class="my-card__pic">
                                <img src="img/my-card.jpg" alt="" class="my-card__img">
                                <div class="my-card__ower"></div>
                                <a href="" class="my-card__edit"></a>
                                <a href="" class="my-card__del"></a>
                            </div>
                            <a href="" class="my-card__title">Кожаный блокнот со сменными блоками</a>
                            <div class="my-card__bottom"><span class="my-card__cash">650 ₽</span><span class="my-card__old-cash">1 600 ₽</span><span class="my-card__views">372</span></div>
                        </div>
                        <div class="my-card">
                            <div class="my-card__pic">
                                <img src="img/my-card.jpg" alt="" class="my-card__img">
                                <div class="my-card__ower"></div>
                                <a href="" class="my-card__edit"></a>
                                <a href="" class="my-card__del"></a>
                            </div>
                            <a href="" class="my-card__title">Кожаный блокнот со сменными блоками</a>
                            <div class="my-card__bottom"><span class="my-card__cash">650 ₽</span><span class="my-card__old-cash">1 600 ₽</span><span class="my-card__views">372</span></div>
                        </div>
                        <div class="my-card">
                            <div class="my-card__pic">
                                <img src="img/my-card.jpg" alt="" class="my-card__img">
                                <div class="my-card__ower"></div>
                                <a href="" class="my-card__edit"></a>
                                <a href="" class="my-card__del"></a>
                            </div>
                            <a href="" class="my-card__title">Кожаный блокнот со сменными блоками</a>
                            <div class="my-card__bottom"><span class="my-card__cash">650 ₽</span><span class="my-card__old-cash">1 600 ₽</span><span class="my-card__views">372</span></div>
                        </div>
                    </div>
                </div>
                <div class="my-items-empty"><img src="img/box.jpg" alt="" class="my-items-empty__img">
                    <h3 class="my-items-empty__title">Мои товары</h3>
                    <span class="my-items-empty__subtitle">Пока нет ни одного добавленного товара</span>
                    <a href="" class="my-items-empty__button">Добавить товар</a>
                </div>
            </div>
            <div class="lk__content @if($section == 'finance') lk__content_active @endif"><span class="lk__tab-link">
                <div class="myfinc">
                    <div class="myfince__top">
                        <h3 class="myfince__title">Мои финансы</h3>
                        <div class="myfince__btnwr"><a href="" class="myfince__button myfince__button_active">Я физическое лицо</a><a href="" class="myfince__button">Я юридическое лицо</a></div>
                    </div>
                    <div class="myfince__content myfince__content_active myfince__content_fiz">
                        <div class="fiz-finance">
                            <div class="fiz-finance__left">
                                <span class="fiz-finance__title">Комиссия сайта 15%</span>
                                <span class="fiz-finance__text">Сервис берет комиссию, только с оплаченных покупок покупателем. В случае возврата денег — комиссия возвращается.</span>
                                <a href="" class="fiz-finance__button">Прикрепить банковскую карту</a>
                                <span class="fiz-finance__text">Вы будете перенаправлены на  сторонний сервис Moneta.ru, где необходимо будет перевести с  банковской карты 1₽. Это делается для проверки вашей карты. В  случае успешного перевода, ваша карта будет привязана к вашему магазину и  вы сможете на неё переводить заработанные на сайте деньги.</span>
                            </div>
                            <div class="fiz-finance__right">
                                <figure class="fiz-finance__card">
                                    <img src="img/pl_card.jpg" alt="" class="fiz-finance__img">
                                    <span class="fiz-finance__name">Ваша карта</span>
                                    <span class="fiz-finance__number">4276 62** **** 8102</span>
                                </figure>
                                <span class="fiz-finance__copy">Все ваши данные надёжно защищены системой шифрования данных PKCS #1 SHA-1 с RSA и передаются по защищённому SSL соединению.</span>
                            </div>
                        </div>
                    </div>
                    <div class="myfince__content myfince__content_ur">
                        <div class="ur-fince">
                            <div class="ur-fince__top">
                                <div class="ur-fince__left-top">
                                    <p>Вы можете внести свои данные как юридического лица только один раз. Как только вся информация будет проверена, мы сформируем для вас договор, который вам нужно будет подписать и отправить в течение 30 дней с момента вашей регистрации на сайте.</p>
                                </div>
                                <div class="ur-fince__right-top">
                                    <h3>Комиссия сайта:</h3>
                                    <ul>
                                        <li>Размер комиссии зависит от ваших продаж</li>
                                        <li>15% — начальная комиссия</li>
                                        <li>12% — вы продали товары на сумму от 50 000 ₽</li>
                                        <li>10% — вы продали товары на сумму от 150 000 ₽</li>
                                    </ul>
                                </div>
                            </div>
                            <form action="" class="ur-fince__body ur-form">
                                <div class="ur-form__left">
                                    <h3 class="ur-form__title ur-form__title_margin">Юридические данные</h3>
                                    <div class="ur-form__group">
                                        <input type="text" class="ur-form__input ur-form__input_small" placeholder="ИНН"><input type="text" class="ur-form__input ur-form__input_small" placeholder="ФИО">
                                    </div>
                                    <div class="ur-form__group">
                                        <label for="ustav" class="ur-form__label">Документ, на основании которого действует директор</label>
                                        <select name="" id="ustav" class="ur-form__select">
                                            <option value="">Устав</option>
                                            <option value="">Устав2</option>
                                            <option value="">Устав3</option>
                                        </select>
                                    </div>
                                    <h3 class="ur-form__title ur-form__title_margin ur-form__title_kontakt">Контактные данные</h3>
                                    <div class="ur-form__group">
                                        <input type="text" class="ur-form__input ur-form__input_small" placeholder="Почтовый адрес"><input type="email" class="ur-form__input ur-form__input_small" placeholder="Электронный адрес">
                                    </div>
                                    <div class="ur-form__group">
                                        <label for="tel" class="ur-form__label">Номер телефона</label>
                                        <input name="" id="tel" type="text" class="ur-form__input">
                                    </div>
                                </div>
                                <div class="ur-form__right">
                                    <h3 class="ur-form__title">Профиль руководителя</h3>
                                    <span class="ur-form__label ur-form__label_otstup">Информация заполняется по паспорту</span>

                                    <input name="" id="adress" type="text" class="ur-form__input ur-form__input_adress" placeholder="Адрес регистрации места жительства">

                                    <div class="ur-form__group">
                                        <label for="mesto" class="ur-form__label">Дата рождения</label>
                                        <input name="" id="mesto" type="text" class="ur-form__input ur-form__input_calend calendar-js">
                                        <input name=""  type="text" class="ur-form__input ur-form__input_auto" placeholder="Место рождения">
                                    </div>
                                    <div class="ur-form__group">
                                        <label for="numpas" class="ur-form__label">Дата выдачи паспорта</label>
                                        <input name="" id="numpas" type="text" class="ur-form__input ur-form__input_calend calendar-js">
                                        <input name=""  type="text" class="ur-form__input ur-form__input_auto" placeholder="Серия и номер паспорта">
                                    </div>
                                    <input name=""  type="text" class="ur-form__input ur-form__input_kem" placeholder="Кем выдан паспорт">
                                    <h3 class="ur-form__title">Банковские реквизиты</h3>
                                    <span class="ur-form__label ur-form__label_margin-b">Укажите счёт, куда мы будем переводить ваши заработанные деньги</span>
                                    <div class="ur-form__group">
                                        <input type="text" class="ur-form__input ur-form__input_bik" placeholder="БИК"><input type="text" class="ur-form__input ur-form__input_schet" placeholder="Расчетный счет">
                                    </div>
                                </div>
                                <div class="ur-form__button-wr">
                                    <button class="ur-form__button">Начать работу</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--<div class="myfince">-->
                <!--<div class="myfince__top">-->
                <!--<h3 class="myfince__title">Мои финансы</h3>-->
                <!--<div class="myfince__btnwr"><a href="" class="myfince__button">Я физическое лицо</a><a href="" class="myfince__button myfince__button_active">Я юридическое лицо</a></div>-->
                <!--</div>-->
                <!---->
                <!--</div>-->
            </div>
            <div class="lk__content @if($section == 'messages') lk__content_active @endif">
                <div class="mesenger">
                    <div class="mesenger__top">
                        <h3 class="mesenger__title">Сообщения</h3>
                        <a href="" class="mesenger__button">Написать в службу поддержки</a>
                    </div>
                    <div class="mesenger__content">
                        <ul class="mesenger__list">
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link mesenger__name-link_last">Антон Программист</a></li>
                        </ul>
                        <div class="mesenger__mesenj-win">
                            <div class="empty-m">
                                <img src="img/flay.jpg" alt="" class="empty-m__img">
                                <h3 class="empty-m__title">Выберите собеседника</h3>
                                <span class="empty-m__subtitle">Чтобы начать переписку, выберите собеседника слева в  списке или воспользуйтесь поиском.</span></div>
                        </div>
                    </div>
                </div>
                <div class="mesenger">
                    <div class="mesenger__top">
                        <h3 class="mesenger__title">Сообщения</h3>
                        <a href="" class="mesenger__button">Написать в службу поддержки</a>
                    </div>
                    <div class="mesenger__content">
                        <ul class="mesenger__list">
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link">Антон Программист</a></li>
                            <li class="mesenger__item"><a href="" class="mesenger__name-link mesenger__name-link_last">Антон Программист</a></li>
                        </ul>
                        <div class="mesenger__mesenj-win">
                            <div class="messenge-win">
                                <div class="messenge-win__content">
                                    <div class="messenge-win__top">
                                        <div class="messenge-win__foto"><img src="img/putin.jpg" alt="" class="messenge-win__img"></div>

                                        <h3 class="messenge-win__name">Владимир Владимирович</h3>
                                    </div>
                                    <div class="messenge-win__date"><span class="messenge-win__date-t">19 марта</span></div>
                                    <div class="messenge">
                                        <div class="messenge__top">
                                            <h3 class="messenge__name">Вы:</h3>
                                            <span class="messenge__date">15:34</span></div>
                                        <p class="messenge__text">Здравствуйте, вы продаете ракетные комлексы С-400?</p>
                                    </div>
                                    <div class="messenge">
                                        <div class="messenge__top">
                                            <h3 class="messenge__name">Владимир Владимирович:</h3>
                                            <span class="messenge__date">15:34</span></div>
                                        <p class="messenge__text">Да продаем, а сколько вам нужно?</p>
                                    </div>
                                </div>
                                <form action="" class="messenge-win__form"><textarea type="text" class="messenge-win__input" placeholder="Напишите сообщение..."></textarea><input type="file" class="messenge-win__file"></form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="file-size"><span class="file-size__text">Прикрепите картинку или видео размером не более 15 мб</span></div>
            </div>
            <div class="lk__content @if($section == 'favorites') lk__content_active @endif">
                <div class="my-items">
                    <div class="my-items__top">
                        <h3 class="my-items__title">Избранное</h3>
                    </div>
                    <div class="my-items__body">
                        <div class="my-card">
                            <div class="my-card__pic">
                                <img src="img/my-card.jpg" alt="" class="my-card__img">
                                <div class="my-card__ower"></div>
                                <a href="" class="my-card__del my-card__del_f"></a>
                            </div>
                            <a href="" class="my-card__title">Кожаный блокнот со сменными блоками</a>
                            <div class="my-card__bottom"><span class="my-card__cash">650 ₽</span><span class="my-card__old-cash">1 600 ₽</span><span class="my-card__views">372</span></div>
                        </div>
                        <div class="my-card">
                            <div class="my-card__pic">
                                <img src="img/my-card.jpg" alt="" class="my-card__img">
                                <div class="my-card__ower"></div>
                                <a href="" class="my-card__del my-card__del_f"></a>
                            </div>
                            <a href="" class="my-card__title">Кожаный блокнот со сменными блоками</a>
                            <div class="my-card__bottom"><span class="my-card__cash">650 ₽</span><span class="my-card__old-cash">1 600 ₽</span><span class="my-card__views">372</span></div>
                        </div>
                        <div class="my-card">
                            <div class="my-card__pic">
                                <img src="img/my-card.jpg" alt="" class="my-card__img">
                                <div class="my-card__ower"></div>
                                <a href="" class="my-card__del my-card__del_f"></a>
                            </div>
                            <a href="" class="my-card__title">Кожаный блокнот со сменными блоками</a>
                            <div class="my-card__bottom"><span class="my-card__cash">650 ₽</span><span class="my-card__old-cash">1 600 ₽</span><span class="my-card__views">372</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lk__content @if($section == 'settings') lk__content_active @endif">
                <div class="settings">
                    <div class="settings__top">
                        <h3 class="settings__title">Настройки</h3>
                    </div>
                    <form action="{{ route('user.update') }}" class="settings__form" method="post">
                        @csrf
                        <div class="settings__left">
                            <label  class="settings__label"><span>Имя</span>
                                <input type="text" class="settings__input" name="name" value="{{ $user->name }}">
                            </label>
                            <label  class="settings__label"><span>Отчество</span>
                                <input type="text" class="settings__input" name="patronymic" value="{{ $user->patronymic }}">
                            </label>
                            <label  class="settings__label"><span>Фамилия</span>
                                <input type="text" class="settings__input" name="surname" value="{{ $user->surname }}">
                            </label>
                            <label  class="settings__label"><span>Эл. почта</span>
                                <input type="email" class="settings__input" name="email" value="{{ $user->email }}">
                            </label>
                        </div>
                        <div class="settings__right">
                            <span class="settings__pass">Изменить пароль</span>
                            <label  class="settings__label"><span>Старый пароль</span>
                                <input type="text" class="settings__input" name="old_password">
                            </label>
                            <label  class="settings__label"><span>Новый пароль</span>
                                <input type="text" class="settings__input" name="password">
                            </label>
                        </div>
                        <div class="settings__bt-wr">
                            <button class="settings__button">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection