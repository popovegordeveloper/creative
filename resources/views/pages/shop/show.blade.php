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
        @else
            <div class="back"><a href="{{ route('shop.edit', $shop->slug) }}" class="back__link">Настройки магазина</a></div>
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
            @if($shop->products->count())
                <div class="magazin__items">
                    @foreach($shop->products as $product)
                        <div class="slot">
                            <a href="{{ route('product.show', $product->id) }}">
                                <div class="slot__wr-img" style="background-image: url({{ asset($product->photos[0]) }}); background-size: cover; background-position: center"></div>
                            </a>
                            <a href="{{ route('product.show', $product->id) }}" class="slot__title">{{ $product->name }}</a>
                            <a href="{{ route('shop.show', $shop->slug) }}" class="slot__name-mag">{{ $shop->name }}</a>
                            <span class="slot__cash">{{ $product->getPrice() }} ₽</span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="my-items-empty">
                    <img src="{{ asset('img/box.jpg') }}" alt="" class="my-items-empty__img">
                    <h3 class="my-items-empty__title">Товары</h3>
                    <span class="my-items-empty__subtitle">Пока нет ни одного добавленного товара</span>
                    @if($shop->user_id == auth()->id()) <a href="{{ route('product.create') }}" class="my-items-empty__button">Добавить товар</a> @endif
                </div>
            @endif

            <div class="magazin__info">
                <div class="mg-info">
                    <div class="mg-info__ls">
                        <div style="background-image: url('{{ asset($shop->master_logo) }}')" class="mg-info__photo"></div>
                        <span class="mg-info__name">{{ $shop->master_name }}</span>
                        <span class="mg-info__dol">Мастер</span>
                    </div>
                    <div class="mg-info__about">
                        <h3 class="mg-info__title">О магазине</h3>
                        <div class="mg-info__text">{{ $shop->description }}</div>
                    </div>
                </div>
            </div>
            @auth
                @if(auth()->id() != $shop->user_id)
                    <a href="" class="magazin__button popup-js">Задать вопрос продавцу</a>
                    @include('blocks.new-message-popup', ['user_id' => $shop->user_id])
                @endif
            @endauth
            @guest
                <a href="" class="magazin__button popup-js">Задать вопрос продавцу</a>
                @include('blocks.new-email', ['user_id' => $shop->user_id, 'shop_id' => $shop->id])
            @endguest
        </div>
    </div>

@endsection
