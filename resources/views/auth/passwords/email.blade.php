@extends('layouts.app')

@section('content')
    <div class="register">
        <h3 class="register__title">Сброс пароля</h3>
        <form method="POST" action="{{ route('password.email') }}" class="register__form">
            @csrf
            <div class="register__group">
                <label for="login" class="register__label">Электронный адрес</label>
                <input type="email" class="register__input" id="login" name="email" value="{{ old('email') }}" required>
            </div>
            <button class="register__button">Отправить</button>
        </form>
    </div>
@endsection
