@extends('layouts.app')

@section('title') Creative Expo @endsection

@section('content')

    <div class="banner">
        <div class="banner__wrapper container-responsive">
            <div class="slider owl-carousel">
                @foreach($articles as $article)
                    <div class="slider__item">
                        <div class="slider__ower"></div>
                        <img src="{{ asset($article->image) }}" alt="" class="slider__img">
                        <div class="slider__article">
                            <div class="slider__text">
                                <h3 class="slider__title">{{ $article->name }}</h3>
                                <p class="slider__subtitle">{{ $article->preview_description }}</p>
                            </div>
                            <a href="{{ route('blog.show', $article->id) }}" class="slider__button">Подробнее</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sell">
                <div class="sell__ower"></div>
                <img src="{{ asset($product_day->photos[0]) }}" alt="" class="sell__img">
                <div class="sell__article">
                    <h3 class="sell__title">Товар дня</h3>
                    <span class="sell__text">{{ $product_day->name }}</span>
                    <a href="{{ route('product.show', $product_day->id) }}" class="sell__button sell__button_yell">Купить</a>
                </div>
            </div>
            <div class="sell">
                <div class="sell__ower"></div>
                <img src="img/collection.jpg" alt="" class="sell__img">
                <div class="sell__article">
                    <h3 class="sell__title sell__title_blue">Колекции</h3>
                    <span class="sell__text">Необычные светильники</span>
                    <a href="" class="sell__button">Подробнее</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="content__wrapper">
            @include('blocks.items', ['products' => $products])
        </div>
        @include('blocks.pagination', ['products' => $products])
    </div>

    <section class="footer-banner">
        <div class="footer-banner__wrapper container">
            <h3 class="footer-banner__title">Что такое Сreative Expo?</h3>
            <p class="footer-banner__subtitle">Мы больше чем просто интернет-магазин</p>
            <a href="{{ route('about') }}" class="footer-banner__button">Читать далее</a></div>
    </section>

@endsection
