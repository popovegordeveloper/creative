<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Creative Expo')</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>

@php
    $body_class = Route::currentRouteName() == 'catalog' ? 'main-page' : 'hide-filter';
@endphp

<body class="{{ $body_class }}">
    <header class="new-header">
        <div class="new-header__row">
            @include('blocks.header-toolbar')
            @include('blocks.header-middle-container')
            @if(request('slug_category'))
                @include('blocks.header-filters')
            @endif
        </div>
    </header>

    @if(!in_array(\Request::route()->getName(), ['home', 'sale', 'catalog', 'categories']))
        <div class="cn">
            <div class="container">
                @yield('content')
            </div>
        </div>
    @else
        @yield('content')
    @endif

    <div style="background: rgba(0,0,0,0.3); width: 100%; height: 100%; position: fixed; z-index: 1000; top: 0; left: 0; display: none" id="order-message">
        <div style="max-width: 1250px;margin: 0 auto;">
            <div style="width: 75%; background: #fff; padding: 35px 35px 35px 35px; border-radius: 5px; margin: 0 auto; margin-top: 10%; position: relative">
                <button style="right: 10px" title="Close (Esc)" type="button" class="mfp-close" id="order-message-close">×</button>
                <form action="{{ route('message.create') }}" method="post" id="order-message-form">
                    @csrf
                    <input type="hidden" id="order-message-user-id" name="user_id">
                    <h3 class="settings-shop__title">Сообщение</h3>
                    <textarea class="settings-shop__textarea big" required style="margin-bottom: 15px" name="text" cols="30" rows="10"></textarea>
                    <button class="mesenger__button" style="cursor: pointer;background: #333;color: #fff; border: none; margin: 0 auto">Отправить</button>
                </form>
            </div>
        </div>
    </div>

    <div style="background: rgba(0,0,0,0.3); width: 100%; height: 100%; position: fixed; z-index: 1000; top: 0; left: 0; display: none" id="order-cancel">
        <div style="width: 300px; background: #fff; padding: 35px 35px 35px 35px; border-radius: 5px; margin: 0 auto; margin-top: 10%; position: relative">
            <button style="right: 10px" title="Close (Esc)" type="button" class="mfp-close" id="order-cancel-close">×</button>
            <form action="{{ route('order.cancel') }}" method="post" id="order-cancel-form">
                @csrf
                <input type="hidden" name="order_id" id="order_cancel_id">
                <p>Причина отмены</p>
                <textarea style="width: 100%;margin-bottom: 15px;font-family: Roboto,sans-serif; padding: 10px" name="text" cols="10" rows="5"></textarea>
                <button class="mesenger__button" id="order-cancel-btn" style="cursor: pointer;background: #333;color: #fff; border: none; margin: 0 auto">Отправить</button>
            </form>
        </div>
    </div>

    @include('blocks.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
