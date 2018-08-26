<div class="header__tags container">
    <div class="tags-carusel tags-carusel-js owl-carousel ">
        @foreach($menu_categories as $category)
            <div class="tags-carusel__item item"><a href="{{ $category->slug }}" class="tags-carusel__link">{{ $category->name }}</a></div>
        @endforeach
    </div>
</div>