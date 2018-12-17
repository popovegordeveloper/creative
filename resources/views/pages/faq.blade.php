@extends('layouts.app')

@section('title') Вопрос - ответ @endsection

@section('content')
    <div class="container">
        <div class="content-box">
            @if(isset($categories))
                <div style="display: flex; justify-content: space-around; flex-wrap: wrap; margin-bottom: 30px">
                    @foreach($categories as $category)
                        <div>
                            <h2>{{ $category->name }}</h2>
                            @foreach($category->questions as $question)
                                <a style="display: block; margin-bottom: 10px; color: #c36" href="{{ route('faq', $question->id) }}">{{ $question->text }}</a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            <a id="answer-button" href="" class="button button_light tab-list__item act" style="margin: 0 auto; width: 200px; display: block">Написать нам</a>
            <div id="answer-form" style="display: none;">
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
            </div>
            @elseif(isset($question))
                <h1 class="content-box__title center">{{ $question->text }}</h1>
                <div class="about-info">
                    {!!  $question->answer->text ?? '' !!}
                </div>
            @endif
        </div>
    </div>
@endsection