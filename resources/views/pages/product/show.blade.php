@extends('layouts.app')

@section('title') {{ $product->name }} @endsection

@section('content')

    {!! Breadcrumbs::render('category', $product->category) !!}

    <div class="main-item-b">
        <div class="main-item-b__wrapper">
            <div class="main-item-b__top">
                <div class="main-item-b__slider">
                    <ul class="card-slider">
                        @foreach($product->photos as $photo)
                            <li >
                                <img src="{{ asset($photo) }}" />
                            </li>
                        @endforeach
                    </ul>
                    <ul class="card-slider-min">
                        @foreach($product->photos as $photo)
                            <li >
                                <img src="{{ asset($photo) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>


                <div class="main-item-b__info">
                    <div class="info-i">
                        <div class="info-i__top">
                            <div class="info-i__magazin">
                                <div class="info-i__img-wr">
                                    <img src="{{ asset($shop->logo) }}" alt="" class="info-i__logo">
                                </div>

                                <span class="info-i__name">{{ $shop->name }}</span>
                                <a href="{{ route('shop.show', $shop->slug) }}" class="info-i__link"></a>
                            </div>
                            @auth
                                @if(auth()->id() != $shop->user_id)
                                    <a href="" class="info-i__button-q popup-js">Задать вопрос продавцу</a>
                                    @include('blocks.new-message-popup', ['user_id' => $shop->user_id])
                                @endif
                            @endauth
                            @guest
                                <a href="" class="info-i__button-q popup-js">Задать вопрос продавцу</a>
                                @include('blocks.new-email', ['user_id' => $shop->user_id, 'product_id' => $product->id])
                            @endguest
                        </div>
                        <h3 class="info-i__title">{{ $product->name }}</h3>
                        <div class="info-i__cash">
                            <span class="info-i__main-cash">{{ $product->getPrice() }} ₽</span>
                            @if($product->sale_price)
                                <span class="info-i__soil">{{ $product->price }} ₽</span>
                            @endif
                        </div>
                        @php
                            $class = (isset($favorites) and in_array($product->id, $favorites)) ? 'fav-active' : '';
                            $url = (isset($favorites) and in_array($product->id, $favorites)) ? route('product.delete_favorite') : route('product.add_favorite');
                        @endphp
                        <form action="{{ $url }}" method="post" style="display: none" id="one-product">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </form>
                        <form action="" class="info-i__form">
                            <input type="number" class="info-i__input-num" value="1" min="1">
                            @if($product->colors->count())
                                <select name="" id="" class="info-i__select">
                                    @foreach($product->colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                            <a href="" class="info-i__bytoclick">Купить в 1 клик</a>
                            <div class="info-i__group">
                                <button class="info-i__button">Добавить в корзину</button>
                                @auth
                                    <a href="" class="info-i__like js-add-favorite {{ $class }}"></a>
                                @endauth
                            </div>
                        </form>
                        <span class="info-i__time">Срок изготовления и отправления {{ $term_dispatch->name }}</span>
                        <span class="info-i__vozvrat">Гарантия возврата денег</span>
                    </div>
                </div>
            </div>
            <div class="main-item-b__about">
                <div class="detail-about">
                    <p class="detail-about__text">{{ $product->description }}</p>
                    <p class="detail-about__text"><b>Состав:</b>   {{ $product->composition }}</p>
                    <p class="detail-about__text"><b>Условия возврата:</b>    {{ $shop->return_conditions }}</p>
                </div>
            </div>
            <div class="main-item-b__social">
                <div class="social-mg social-mg_detail">
                    <span class="social-mg__discr social-mg__discr_detail">Поделиться:</span>
                    <div class="social-mg__links">
                        <a href="" class="social-mg__link social-mg__link_fb social-mg__link_detail"></a>
                        <a href="" class="social-mg__link social-mg__link_vk social-mg__link_detail"></a>
                        <a href="" class="social-mg__link social-mg__link_gp social-mg__link_detail"></a>
                        <a href="" class="social-mg__link social-mg__link_pin social-mg__link_detail"></a>
                    </div>
                </div>
            </div>
            <div class="main-item-b__ozer">
                <div class="ozer">
                    <h3 class="ozer__title">Другие товары из этого магазина</h3>
                    <div class="ozer__wrapper">
                            @php $products = $shop->products->take(4); @endphp
                        @foreach($products as $item)
                            <div class="slot">
                                <div class="slot__wr-img"><img src="{{ asset($item->photos[0]) }}" alt="" class="slot__img"></div>
                                <a href="{{ route('product.show', $item->id) }}" class="slot__title">{{ $item->name }}</a>
                                <a href="{{ route('shop.show', $shop->slug) }}" class="slot__name-mag">{{ $shop->name }}</a>
                                <span class="slot__cash">{{ $item->getPrice() }}  ₽</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="main-item-b__pohoj">
                <div class="ozer">
                    <h3 class="ozer__title">Похожие товары</h3>
                    <div class="ozer__wrapper">
                        @foreach($similar_products as $item)
                            <div class="slot">
                                <div class="slot__wr-img"><img src="{{ asset($item->photos[0]) }}" alt="" class="slot__img"></div>
                                <a href="{{ route('product.show', $item->id) }}" class="slot__title">{{ $item->name }}</a>
                                <a href="{{ route('shop.show', $shop->slug) }}" class="slot__name-mag">{{ $shop->name }}</a>
                                <span class="slot__cash">{{ $item->getPrice() }}  ₽</span>
                            </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
