@extends('layouts.app')

@section('title') Что такое Creative Expo? @endsection

@section('content')

            <div class="content-box">
                <div class="content-box__title center">Что такое Creative Expo?</div>
                <div class="head-about"><strong>Creative Expo</strong> - креативный проект для тех, кто отличается.</div>
                <ul class="tab-list">
                    <li class="button button_light tab-list__item act">Для покупателей</li>
                    <li class="button button_light tab-list__item">Для мастеров</li>
                </ul>
                <div class="tabs">
                    <div class="tabs__item opn">
                        <div class="about-info">
                            <div class="about-info__item">
                                <div class="about-info__ico"><img src="img/ico-about-diamond.svg" width="128" height="128" alt="" title=""></div>
                                <div class="about-info__label">Уникальные изделия</div>
                                <div class="about-info__text">На нашей платформе вы можете покупать товары ручной работы от разных мастеров со всех уголков нашей страны.</div>
                            </div>
                            <div class="about-info__item">
                                <div class="about-info__ico"><img src="img/ico-about-muza.svg" width="128" height="128" alt="" title=""></div>
                                <div class="about-info__label">Вдохновение</div>
                                <div class="about-info__text">У нас вы найдете креативные решения для вашего дома, офиса, для необычного подарка и конечно же для себя</div>
                            </div>
                            <div class="about-info__item">
                                <div class="about-info__ico"><img src="img/ico-about-idea.svg" width="128" height="128" alt="" title=""></div>
                                <div class="about-info__label">Воплощение идей</div>
                                <div class="about-info__text">Для Вас в скором времени будет реализована возможность воплотить
                                    в реальность ваши необычные креативные идеи благодаря нашей платформе</div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs__item">
                        <div class="about-info">
                            <div class="about-info__item">
                                <div class="about-info__ico"><img src="img/ico-about-time.svg" width="128" height="128" alt="" title=""></div>
                                <div class="about-info__label">Продавай и экономь время</div>
                                <div class="about-info__text">Всю рекламу и привлечение клиентов мы берем на себя. От Вас требуется лишькачественные фотографии ваших товаров.</div>
                            </div>
                            <div class="about-info__item">
                                <div class="about-info__ico"><img src="img/ico-about-website.svg" width="128" height="128" alt="" title=""></div>
                                <div class="about-info__label">У Вас уже есть свой сайт?</div>
                                <div class="about-info__text">Мы даем Вам возможность частичного присутствия на сайте. Вместо кнопки купить мы ставим ссылку на товар на вашем сайте, тем самым покупатель будет переходить на ваш
                                    сайт.</div>
                            </div>
                            <div class="about-info__item">
                                <div class="about-info__ico"><img src="img/ico-about-favorite.svg" width="128" height="128" alt="" title=""></div>
                                <div class="about-info__label">Тебя видят все!</div>
                                <div class="about-info__text">Мы не ограничиваемся рекламой только на нашем сайте. Ваши товары будут доступны так же на наших страницах в социальных сетях.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-info content-box__banner-info">
                    <div class="banner-info__wrap">
                        <div class="banner-info__title">«Creative expo»</div>
                        <div class="banner-info__label">Интернет платформа с креативными и уникальными товарами</div>
                    </div>
                    <img src="img/about.jpg" width="1082" height="400" alt="" title="" class="banner-info__img">
                </div>
                <article class="article clfix">
                    <p>Представляем вашему вниманию новую площадку, где вы можете приобрести необычное креативное изделие, зарядиться новыми идеями найти товары, которые вы не увидите на прилавках магазинов, отлучиться и стать уникальными.</p>
                    <p>Наш цель объединить в единой глобальной площадке тех, кто заинтересован в покупке необычных товаров и тех, кто продает эти необычные товары.</p>
                    <p>Мы помогаем отойти от шаблонных работ про раскрутки и продвижению ваших товаров, давая вам возможность заниматься производством, не теряя время на маркетинг.</p>
                    <p>Последнее является нашей задачей. Товары на нашей площадке вы покупаете по ценам производителя.
                        Мы не ставим наценку сверх установленной производителем суммы.</p>
                    <div class="article__ps">Приятного пользования! <br><br>С Уважением, команда Creative Expo.</div>
                    @auth
                        <a href="{{ route('cabinet', 'messages') }}?id={{ $conversation_with_admin->id }}" class="button article__option-button">Написать нам</a>
                    @endauth
                    @guest
                        <a href="" class="button article__option-button popup-js">Написать нам</a>
                        @include('blocks.email-about')
                    @endguest
                </article>
            </div>
@endsection