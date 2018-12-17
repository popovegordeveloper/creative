@extends('layouts.app')

@section('title') Правила использования @endsection

@section('content')
            <div class="content-box">
                <div class="content-box__title center">Техническая поддержка</div>
                <div class="head-about"><strong>Creative Expo</strong> - креативный проект для тех, кто отличается.</div>
                <div style="margin-bottom: 30px">Если у Вас есть вопроссы, пожелания или предложения по работе с сервисом, Вы можете связаться с нами
                по электронной почте: <span style="color: #c36">{{ $email->value }}</span>. Или отправить нам сообщение с помощью формы обратной связи:</div>
                <div class="tabs">
                    <div class="tabs__item opn">
                        <div class="about-info" id="answer-form">
                            <form action="{{ route('mail.answer') }}" style="width: 350px; margin: 0 auto; display: block">
                                @csrf
                                <div style="margin-bottom: 15px;">
                                    <label for="name" style="display: block">Имя</label>
                                    <input type="text" class="text-form" required name="name" id="name" style="width: 100%">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label for="email" style="display: block">Email</label>
                                    <input type="email" class="text-form" required name="email" id="email" style="width: 100%">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label for="message" style="display: block">Сообщение</label>
                                    <textarea class="text-form" required name="message" id="message" style="width: 100%"></textarea>
                                </div>
                                <button class="button button_light tab-list__item act" style="margin: 0 auto; display: block">Отправить</button>
                            </form>
                            <p style="text-align: center; width: 100%; margin-top: 30px; display: block">Если у Вас возникли вопросы по какому-лио товару, вы можете задать ихпродавцу с помощью кнопки</p>
                            <div style="background-image: url({{ asset('img/product-answer.jpg') }}); width: 50%; height: 300px; background-size: cover; background-position: right; display: block; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
