@extends('layouts.app')

@section('title') Каталог @endsection

@section('content')
    <div class="content">
        <div class="content__wrapper">
            @include('blocks.items', ['products' => $products])
        </div>
    </div>
@endsection
