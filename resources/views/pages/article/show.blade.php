@extends('layouts.app')

@section('title') {{ $article->name }} @endsection

@section('content')

    <div class="content-box">
        <div class="content-box__title center">{{ $article->name }}</div>
        <div class="blog-box">
            <img src="{{ asset($article->image) }}" alt="">
            {!! $article->description !!}
        </div>
    </div>

@endsection