@extends('layouts.app')

@section('title') Вакансия: {{ $vacancy->name }} @endsection

@section('content')

    <div class="content-box">
        <div class="content-box__title center">{{ $vacancy->name }}</div>
        <div class="blog-box">
            {{ $vacancy->description }}
        </div>
    </div>

@endsection