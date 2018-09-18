@extends('layouts.app')

@section('title') Кабинет @endsection

@section('content')

    <div class="lk">
        <div class="lk__wrapper">
            <ul class="lk__tabs">
                @if($user->shop)<li class="lk__tab-item lk__tab-item_1 @if(!$section or $section == 'products') lk__tab-item_active @endif"><span class="lk__tab-link">Мои товары</span></li>@endif
                <li class="lk__tab-item @if(!$user->shop) lk__tab-item_1 @else lk__tab-item_7 @endif @if($section == 'purchases') lk__tab-item_active @endif"><span class="lk__tab-link">Мои покупки</span></li>
                @if($user->shop)<li class="lk__tab-item lk__tab-item_6 @if($section == 'selling') lk__tab-item_active @endif"><span class="lk__tab-link">Мои заказы</span></li>@endif
                @if($user->shop)<li class="lk__tab-item lk__tab-item_2 @if($section == 'finance') lk__tab-item_active @endif"><span class="lk__tab-link">Мои финансы</span></li>@endif
                <li class="lk__tab-item lk__tab-item_3 @if($section == 'messages') lk__tab-item_active @endif"><span class="lk__tab-link">Сообщения</span></li>
                <li class="lk__tab-item lk__tab-item_4 @if($section == 'favorites') lk__tab-item_active @endif"><span class="lk__tab-link">Избранное</span></li>
                <li class="lk__tab-item lk__tab-item_5 @if($section == 'settings') lk__tab-item_active @endif"><span class="lk__tab-link">Настройки</span></li>
            </ul>

            @include('blocks.cabinet-products')
            @include('blocks.cabinet-purchases')
            @if($user->shop)@include('blocks.cabinet-selling')@endif
            @if($user->shop)@include('blocks.cabinet-finance')@endif
            @include('blocks.cabinet-messages')
            @include('blocks.cabinet-favorites')
            @include('blocks.cabinet-settings')
        </div>
    </div>

@endsection
