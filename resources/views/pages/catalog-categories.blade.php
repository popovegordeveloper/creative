@extends('layouts.app')

@section('title') Каталог @endsection

@section('content')
    <div class="content">
        <div style="display: flex; flex-wrap: wrap;">
            @foreach($categories as $symbol => $categories_collection)
                <div style="flex: 0 0 25%;max-width: 25%;position: relative;width: 100%;min-height: 1px;padding-right: 10px;padding-left: 10px;">
                    <div class="bl" style="float: left;padding: 0 10px;position: relative;margin: 0 0 20px 00px;width: 100%;">
                        <div class="border" style="border: 1px solid #c51f5d; padding: 60px 10px 20px;">
                            <div class="letter" style="background-color: #c51f5d;position: absolute;top: 0;left: 10px;width: 40px;height: 40px;line-height: 40px;font-size: 24px;text-align: center;color: #fff;">{{ $symbol }}</div>
                            <ul>
                                @foreach($categories_collection as $category)
                                    <li style="float: none;margin: 0;list-style: none; padding-bottom: 10px">
                                        <a style="font-weight: 700;" class="slider-menu__link" href="{{ $category->url }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--{{ dd($categories) }}--}}
        </div>
    </div>
@endsection
