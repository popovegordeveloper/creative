@extends('layouts.app')

@section('content')

    <div class="register">
        <h3 class="register__title">Вход в аккаунт</h3>
        <form method="POST" action="{{ route('login') }}" class="register__form">
            @csrf
            <div class="register__group">
                <label for="login" class="register__label">Электронный адрес</label>
                <input type="email" class="register__input" id="login" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="register__group">
                <label for="password" class="register__label">Пароль</label>
                <input type="password" class="register__input" id="password" name="password" required>
            </div>
            <div class="social-en">
                <span class="social-en__title">Или авторизируетесь через соц сети:</span>
                <div class="social-en__wrapper">
                    <a href="{{ route('social_login', 'facebook') }}" class="social-en__link social-en__link_fb"></a>
                    {{--<a href="{{ route('social_login', 'pinterest') }}" class="social-en__link social-en__link_pin"></a>--}}
                    <a href="{{ route('social_login', 'google') }}" class="social-en__link social-en__link_gp"></a>
                </div>
            </div>
            <button class="register__button">Вход</button>
        </form>
        <span class="register__conf"><a href="{{ route('password.request') }}">Не помню пароль</a></span>
    </div>

@endsection
