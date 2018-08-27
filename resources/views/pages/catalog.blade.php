@extends('layouts.app')

@section('title') Каталог @endsection

@section('content')
    <div class="content">
        <div class="content__wrapper">
            @foreach($products as $product)
                @php $class = rand(0, 1); @endphp
                <div class="card @if(!$class) card_long @endif">
                    <div class="card__img-w">
                        <img src="{{ asset($product->photos[0]) }}" alt="" class="card__img">
                        <div class="card__hover-w">
                            <a href="" class="card__hover-link"></a>
                            <a href="" class="card__like"></a>
                            <a href="" class="card__bay">В корзину</a>
                            <a href="" class="card__more">Подробнее</a>
                        </div>
                    </div>
                    <a href="" class="card__title">{{ $product->name }}</a>
                    <a href="" class="card__shopname">{{ $product->shop->name }}</a>
                    <span class="card__cash">{{ $product->cost }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection