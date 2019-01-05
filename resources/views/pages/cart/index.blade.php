@extends('layouts.app')

@section('title') Корзина @endsection

@section('content')

    <div class="lk">
        <div class="lk__wrapper">
            <ul class="lk__tabs">
                <li class="lk__tab-item lk__tab-item_1 step1 lk__tab-item_active"><span class="lk__tab-link">Шаг 1</span></li>
                @if(\Gloudemans\Shoppingcart\Facades\Cart::count())
                    <li class="lk__tab-item lk__tab-item_2 step2" style="pointer-events: none"><span class="lk__tab-link">Шаг 2</span></li>
                @endif
            </ul>
            @include('blocks.cart-step1')
            @if(\Gloudemans\Shoppingcart\Facades\Cart::count())
                @include('blocks.cart-step2')
            @endif
        </div>
    </div>

@endsection