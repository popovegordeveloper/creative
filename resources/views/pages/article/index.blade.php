@extends('layouts.app')

@section('title') Блог @endsection

@section('content')
    <div class="content-box">
        <div class="content-box__title center">Блог</div>
        <div class="blog-list">
            @if($articles->count())
                @foreach($articles as $article)
                    <div class="blog-list__item">
                        <a href="{{ route('blog.show', $article->id) }}" class="blog-list__link">
                            <img src="{{ asset($article->image) }}" alt="" class="blog-list__img">
                        </a>
                        <h3 class="blog-list__title">{{ $article->name }}</h3>
                        <p class="blog-list__text">{{ $article->preview_description }}</p>
                        <a href="{{ route('blog.show', $article->id) }}" class="blog-list__btn">Подробнее</a>
                    </div>
                @endforeach
            @else
                <h3 style="text-align: center; width: 100%">На данный момент нет статей</h3>
            @endif

            @include('blocks.pagination', ['products' => $articles])

        </div>
    </div>

@endsection