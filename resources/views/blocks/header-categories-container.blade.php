<div class="container">
    <div class="slider-menu">
        @foreach($menu_categories as $category)
            <a href="{{ route('catalog', $category->slug) }}" class="slider-menu__link @if($category->slug == request('slug_category')) slider-menu__link--active @endif">{{ $category->name }}</a>
        @endforeach
    </div>
</div>