<footer class="footer">
    <div class="footer__wrapper container">
        <div class="footer__logo">
            <div class="logo-f">
                <a href="{{ route('home') }}" class="logo-f__link">
                    <img src="{{ asset('img/logo-vert.svg') }}" alt="" class="logo-f__img">
                </a>
            </div>
        </div>
        <div class="footer__menu">
            <ul class="menu">
                <li class="menu__item"><span class="menu__title">О нас</span></li>
                <li class="menu__item"><a href="{{ route('about') }}" class="menu__link">Что такое Creative Expo?</a></li>
                <li class="menu__item"><a href="{{ route('blog') }}" class="menu__link">Наш блог</a></li>
                <li class="menu__item"><a href="{{ route('vacancy') }}" class="menu__link">Вакансии</a></li>
            </ul>
        </div>
        <div class="footer__menu">
            <ul class="menu">
                <li class="menu__item"><span class="menu__title">Помощь</span></li>
                <li class="menu__item"><a href="{{ route('rules') }}" class="menu__link">Правила пользования сервисом</a></li>
                <li class="menu__item"><a href="{{ route('technical') }}" class="menu__link">Техническая поддержка</a></li>
                <li class="menu__item"><a href="{{ route('faq') }}" class="menu__link">Вопрос - Ответ</a></li>
            </ul>
        </div>
        <div class="footer__social">
            <div class="social"><span class="social__title">Мы в соц сетях</span>
                <ul class="social__list">
                    <li class="social__item"><a href="{{ $settings->where('key', 'instagram')->first()->value }}" class="social__link social__link_in"></a></li>
                    <li class="social__item"><a href="{{ $settings->where('key', 'facebook')->first()->value }}" class="social__link social__link_fb"></a></li>
                    <li class="social__item"><a href="{{ $settings->where('key', 'vk')->first()->value }}" class="social__link social__link_vk"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copy container"><span class="copy__text">© Creativexpo.ru 2018</span></div>
</footer>


<div class="message-popup" style="display: none; opacity: 0">
    <p>Товар добавлен в избранное</p>
</div>