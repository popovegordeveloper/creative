@extends('layouts.app')

@section('title') {{ $shop->name }} @endsection

@section('content')

    <div class="brandback">
        @if(auth()->id() != $shop->user_id)
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Украшения</a></li>
                <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Украшения на шею</a></li>
            </ul>
            <div class="back"><a href="" class="back__link">Вернуться в каталог</a></div>
        @endif
    </div>

    <div class="magazin">
        <div class="magazin__wrapper">
            <div class="magazin__banner">
                <div class="bn-m">
                    <div class="bn-m__img-wr">
                        <div style="background: url('{{ asset($shop->cover) }}') center;background-size: cover;" class="bn-m__img"></div>
                        <div class="bn-m__img-ow"></div>
                    </div>

                    <a href="" class="bn-m__logo-link">
                        <div style="height: 100%;background: url('{{ asset($shop->logo) }}') center;background-size: cover;" class="bn-m__logo"></div>
                    </a>
                    <h3 class="bn-m__title">{{ $shop->name }}</h3>
                    <span class="bn-m__subtitle">{{ $shop->description_preview }}</span>
                    <div class="bn-m__footer">
                        <span class="bn-m__city">{{ $shop->city }}</span>
                        <div class="social-mg">
                            <span class="social-mg__discr">Поделиться:</span>
                            <div class="social-mg__links">
                                <a href="" class="social-mg__link social-mg__link_fb"></a>
                                <a href="" class="social-mg__link social-mg__link_vk"></a>
                                <a href="" class="social-mg__link social-mg__link_gp"></a>
                                <a href="" class="social-mg__link social-mg__link_pin"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="magazin__items">--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
                {{--<div class="slot">--}}
                    {{--<div class="slot__wr-img"><img src="img/card-1.jpg" alt="" class="slot__img"></div>--}}
                    {{--<a href="" class="slot__title">ОП! Усята</a>--}}
                    {{--<a href="" class="slot__name-mag">ОП!</a>--}}
                    {{--<span class="slot__cash">3 200 ₽</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="magazin__info">
                <div class="mg-info">
                    <div class="mg-info__ls">
                        <img src="{{ asset($shop->master_logo) }}" alt="" class="mg-info__photo">
                        <span class="mg-info__name">{{ $shop->master_name }}</span>
                        <span class="mg-info__dol">Мастер</span>
                    </div>
                    <div class="mg-info__about">
                        <h3 class="mg-info__title">О магазине</h3>
                        <div class="mg-info__text">{{ $shop->description }}</div>
                    </div>
                </div>
            </div>
            <a href="" class="magazin__button">Задать вопрос продавцу</a>
        </div>
    </div>

@endsection