@extends('layouts.app')

@section('title') Вакансии @endsection

@section('content')
    <div class="content-box">
        <div class="content-box__title center">Вакансии</div>
        <div class="vacancy-list">
            @if($vacancies->count())
                @foreach($vacancies as $vacancy)
                    <div class="vacancy-list__item">
                        <h3 class="vacancy-list__title">{{ $vacancy->name }}</h3>
                        <p class="vacancy-list__text">{{ $vacancy->preview_description }}</p>
                        <a href="{{ route('vacancy.show', $vacancy->id) }}" class="vacancy-list__btn">Подробнее</a>
                    </div>
                @endforeach
            @else
                <h3 style="text-align: center; width: 100%">На данный момент нет вакансий</h3>
            @endif
        </div>
    </div>

@endsection