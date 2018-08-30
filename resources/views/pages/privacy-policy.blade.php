@extends('layouts.app')

@section('title') Правила использования @endsection

@section('content')
            <div class="content-box">
                <div class="content-box__title center">{{ $page->name }}</div>
                <div class="head-about"><strong>Creative Expo</strong> - креативный проект для тех, кто отличается.</div>
                <div class="tabs">
                    <div class="tabs__item opn">
                        <div class="about-info">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
@endsection
