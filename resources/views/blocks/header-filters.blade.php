<div class="filter">
    <div class="filter__wrapper container">
        <div class="filter__tags">
            <ul class="tags">
                @foreach($sub_categories as $sub_category)
                    <li class="tags__item"><a href="" class="tags__link"><span class="tags__text">{{ $sub_category->name }}</span></a></li>
                @endforeach
            </ul>
        </div>
        <div class="filter__filter">

            <div class="cashfilter">
                <span class="cashfilter__title">Цена, ₽</span>
                <div class="cashfilter__slider" id="slider"></div>
            </div>
            <form class="cashfilter-form" action="">
                <label for="" class="cashfilter-form__label">
                    <input class="cashfilter-form__input" type="text" id="input-number">
                    <span class="cashfilter-form__reset" id="left-res"></span>
                </label>

                <span class="cashfilter-form__line"></span>
                <label for="" class="cashfilter-form__label">
                    <input class="cashfilter-form__input" type="text" id="input-number2">
                    <span class="cashfilter-form__reset" id="rig-res"></span>
                </label>

                <input type="checkbox" id="cashfilterchek" class="cashfilter-form__chek">
                <label for="cashfilterchek" class="cashfilter-form__labelchek">Только со скидкой</label>
                <button class="cashfilter-form__button">показать</button>
            </form>
        </div>
        <div class="filter__close">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
        </div>
    </div>
</div>