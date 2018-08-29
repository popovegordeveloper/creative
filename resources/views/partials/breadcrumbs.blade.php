@if (count($breadcrumbs))

    <div class="brandback">
        <ul class="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
        @endforeach
        </ul>
    </div>

@endif