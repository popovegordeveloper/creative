<div class="lk__content @if($section == 'finance') lk__content_active @endif">
    <div class="myfinc">
        <div class="myfince__top">
            <h3 class="myfince__title">Мои финансы</h3>
            <div class="myfince__btnwr"><a href="" class="myfince__button myfince__button_active">Я физическое
                    лицо</a><a href="" class="myfince__button">Я юридическое лицо</a></div>
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
                        <p>Вы можете внести свои данные как юридического лица только один раз. Как только вся информация
                            будет проверена, мы сформируем для вас договор, который вам нужно будет подписать и
                            отправить в течение 30 дней с момента вашей регистрации на сайте.</p>
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
                            <input type="text" class="ur-form__input ur-form__input_small" placeholder="ИНН"><input
                                type="text" class="ur-form__input ur-form__input_small" placeholder="ФИО">
                        </div>
                        <div class="ur-form__group">
                            <label for="ustav" class="ur-form__label">Документ, на основании которого действует
                                директор</label>
                            <select name="" id="ustav" class="ur-form__select">
                                <option value="">Устав</option>
                                <option value="">Устав2</option>
                                <option value="">Устав3</option>
                            </select>
                        </div>
                        <h3 class="ur-form__title ur-form__title_margin ur-form__title_kontakt">Контактные данные</h3>
                        <div class="ur-form__group">
                            <input type="text" class="ur-form__input ur-form__input_small" placeholder="Почтовый адрес"><input
                                type="email" class="ur-form__input ur-form__input_small"
                                placeholder="Электронный адрес">
                        </div>
                        <div class="ur-form__group">
                            <label for="tel" class="ur-form__label">Номер телефона</label>
                            <input name="" id="tel" type="text" class="ur-form__input">
                        </div>
                    </div>
                    <div class="ur-form__right">
                        <h3 class="ur-form__title">Профиль руководителя</h3>
                        <span class="ur-form__label ur-form__label_otstup">Информация заполняется по паспорту</span>

                        <input name="" id="adress" type="text" class="ur-form__input ur-form__input_adress"
                               placeholder="Адрес регистрации места жительства">

                        <div class="ur-form__group">
                            <label for="mesto" class="ur-form__label">Дата рождения</label>
                            <input name="" id="mesto" type="text"
                                   class="ur-form__input ur-form__input_calend calendar-js">
                            <input name="" type="text" class="ur-form__input ur-form__input_auto"
                                   placeholder="Место рождения">
                        </div>
                        <div class="ur-form__group">
                            <label for="numpas" class="ur-form__label">Дата выдачи паспорта</label>
                            <input name="" id="numpas" type="text"
                                   class="ur-form__input ur-form__input_calend calendar-js">
                            <input name="" type="text" class="ur-form__input ur-form__input_auto"
                                   placeholder="Серия и номер паспорта">
                        </div>
                        <input name="" type="text" class="ur-form__input ur-form__input_kem"
                               placeholder="Кем выдан паспорт">
                        <h3 class="ur-form__title">Банковские реквизиты</h3>
                        <span class="ur-form__label ur-form__label_margin-b">Укажите счёт, куда мы будем переводить ваши заработанные деньги</span>
                        <div class="ur-form__group">
                            <input type="text" class="ur-form__input ur-form__input_bik" placeholder="БИК"><input
                                type="text" class="ur-form__input ur-form__input_schet" placeholder="Расчетный счет">
                        </div>
                    </div>
                    <div class="ur-form__button-wr">
                        <button class="ur-form__button">Начать работу</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
