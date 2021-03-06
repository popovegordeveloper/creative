<div class="new-header__bottom" @if(request('slug_subcategory')) style="display: block" @endif>
    <div class="container">
        <form action="" class="filter-new">
            <div class="tags-new">
                @foreach($sub_categories as $sub_category)
                    <a href="{{ route('catalog', ['slug_category' => $slug_category, 'slug_subcategory' => $sub_category->slug]) }}" class="tags-new__item @if($sub_category->slug == request('slug_subcategory')) active @endif"><span class="tags-new__text">{{ $sub_category->name }}</span></a>

                    {{--<label class="tags-new__item">--}}
                        {{--<input type="checkbox" class="tags-new__input">--}}
                        {{--<span class="tags-new__text">{{ $sub_category->name }}</span>--}}
                        {{--<a href="" class="tags-new__del"><i class="fa fa-times" aria-hidden="true"></i></a>--}}
                    {{--</label>--}}
                @endforeach
            </div>
            <div class="slider-range">
                <div class="slider-range__group">
                    <div class="slider-range__label">Цена, ₽</div>
                    <div class="slider-range__slider"></div>
                </div>
                <div class="slider-range__group slider-range__group--otstup">
                    <div class="slider-range__inpwr">
                        <input type="text" name="cost_from" class="slider-range__input slider-range__input--min" value="{{ $min }}">
                        <div class="slider-range__del slider-range__del--min"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
                    </div>
                    <div class="slider-range__line"></div>
                    <div class="slider-range__inpwr">
                        <input type="text" name="cost_to" class="slider-range__input slider-range__input--max" value="{{ $max }}">
                        <div class="slider-range__del slider-range__del--max"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="slider-range__box">
                    <label class="slider-range__chek @if(request('sale')) active @endif">
                        <input type="checkbox" class="slider-range__chek-in" name="sale" value="true" @if(request('sale')) checked @endif>
                        <span class="slider-range__chek-l">Только со скидкой</span>
                    </label>

                    <button class="slider-range__button"  @if(request('sale') or request('cost_from') or request('cost_to')) style="display: inline-block" @endif>показать</button>

                </div>
            </div>
        </form>
    </div>
</div>