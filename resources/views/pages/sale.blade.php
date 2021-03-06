@extends('layouts.app')

@section('title') Распродажа @endsection

@section('content')
    <div class="content">
        <div class="content__wrapper">
            @include('blocks.items', ['products' => $products])
        </div>
        @include('blocks.pagination', ['products' => $products])
    </div>
@endsection
