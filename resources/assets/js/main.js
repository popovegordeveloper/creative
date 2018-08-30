$(document).ready(function () {


    $('.js-add-favorite').click(function (e) {
        e.preventDefault();
        if ($(this).hasClass('fav-active')) $(this).removeClass('fav-active');
        else $(this).addClass('fav-active');
        var $form = $(this).find('form');
        $.post($form.attr('action'), $form.serialize());
    });

    $('.js-del-favorite').click(function (e) {
        e.preventDefault();
        var $form = $(this).find('form');
        $.post($form.attr('action'), $form.serialize());
        $(this).parents('.my-card').remove();
    });

    $('.cashfilter-form').change(function () {
        $('.cashfilter-form__button').addClass('cashfilter-form__button_active');
    });
    $('.cashfilter-form__input').on('edit', function() {
        $('.cashfilter-form__button').addClass('cashfilter-form__button_active');

    });


    $('.slider').slick({
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>'
    });
    $('.content__wrapper').masonry({
        // options
        itemSelector: '.card',
        gutter: 30,
        fitWidth: true
        // columnWidth: 200
    });


    $('.card-slider').slick({
        slidesToShow: 1,
        asNavFor: '.card-slider-min',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
        infinite: true
    });
    $('.card-slider-min').slick({
        slidesToScroll: 4,
        slidesToShow: 4,
        centerMode: true,
        variableWidth: true,
        asNavFor: '.card-slider',
        focusOnSelect: true,
        infinite: true,
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>'
    });
    $('.card__hover-w').on('mouseenter touchstart', function () {
        $(this).find('.card__like').removeClass('fadeOutUp').addClass('card__like_active animated fadeInDown');
        $(this).find('.card__bay').removeClass('fadeOutDown').addClass('card__bay_active animated fadeInUp');
        $(this).find('.card__more').removeClass('fadeOutDown').addClass('card__more_active animated fadeInUp');

    }).on('mouseleave', function () {
        $(this).find('.card__like').removeClass('card__like_active fadeInDown').addClass('fadeOutUp');
        $(this).find('.card__bay').removeClass('card__bay_active fadeInUp').addClass('fadeOutDown');
        $(this).find('.card__more').removeClass('card__more_active fadeInUp').addClass('fadeOutDown');

    });
    $('.my-card__pic').on('mouseenter touchstart', function () {
        $(this).find('.my-card__edit, .my-card__del').removeClass('fadeOutUp').addClass('animated fadeInDown');
        $(this).find('.my-card__ower').css({opacity: 0.5})
    }).on('mouseleave', function () {
        $(this).find('.my-card__edit, .my-card__del').removeClass('fadeInDown').addClass('fadeOutUp');
        $(this).find('.my-card__ower').css({opacity: 0})

    });
    //tags


    var headerModal = $('.modal-header');
    var openModalBtn = $('.log-ext__link--in-js');

    openModalBtn.on('click', function (evt) {
        evt.preventDefault();
        headerModal.slideToggle(300);
    });

    $(document).on('click', function (e){
        var div = headerModal;
        if (!div.is(e.target) && !openModalBtn.is(e.target) && div.has(e.target).length === 0) {
            div.slideUp(300);
        }
    });

    function windowSize(){
        if($(window).width() < 992){
            $('.filter').css({display: 'none'});
            $('.login').prependTo('.filter__wrapper');
            $('.create-shop').prependTo('.filter__wrapper');
        }else{

            $('.login').appendTo('.header__topbar-wrapper');
            $('.create-shop').appendTo('.header__main');


        }
    }
    $(window).on('load resize scroll', windowSize);




    //вкладки в личном кабирене
    $('ul.lk__tabs').each(function() {
        $(this).find('li').each(function(i) {
            $(this).click(function(){
                $(this).addClass('lk__tab-item_active').siblings().removeClass('lk__tab-item_active')
                    .closest('.lk').find('.lk__content').removeClass('lk__content_active').eq(i).addClass('lk__content_active');
            });
        });
    });


    $('.myfince__btnwr').each(function() {
        $(this).find('.myfince__button').each(function(i) {

            $(this).click(function(e){
                e.preventDefault();
                $(this).addClass('myfince__button_active').siblings().removeClass('myfince__button_active')
                    .closest('.myfinc').find('.myfince__content').removeClass('myfince__content_active').eq(i).addClass('myfince__content_active');
            });
        });
    });


    // delivery select
    $('.delivery__checkbox').on('change', function() {

        if ($(this).is(':checked')) {
            $(this).closest('tr').removeClass("disabled").find('.delivery__price-value').removeAttr("disabled");
        } else {
            $(this).closest('tr').addClass("disabled").find('.delivery__price-value').attr("disabled","disabled");
        }

        if ($(this).is('#sm')) {
            if ($(this).is(':checked')) {
                $('#sm-textarea').removeClass("hidden");
            } else {
                $('#sm-textarea').addClass("hidden");
            }
        }

    });

    $('.info-i__input-num, .info-i__select, .ur-form__select, .messenge-win__file, .delivery__checkbox, .select, .input-num, .quantity__any input').styler();

    $('.settings-shop__logo').styler({
        fileBrowse: 'Лого'
    });
    $('.settings-shop__obloj').styler({
        fileBrowse: 'Загрузить обложку'
    });
    $('.goods-photo-add').styler({
        fileBrowse: 'Перетащите или выберите фотографии'
    });


    $(document).on('keypress', '.price-n-discount__value span', function(e){
        return e.which != 13;
    });

    $(document).on("keydown", ".price-n-discount__value span", function(event) {
        var element = $(this);
        var maximumLength = element.attr("data-maxlength");
        var currentLength = element.text().length + 1;

        element.find('input').val(element.text());

        if(currentLength > maximumLength && event.keyCode != 8) {
            event.preventDefault();
            return false;
        }
    });

    $(document).on("keyup", ".price-n-discount__value span", function(event) {
        var element = $(this);
        element.find('input').val(element.text());
    });

    $('#any').on('change', function() {

        if ($(this).is(':checked')) {
            $(this).closest('.quantity').find(".input-num").attr("disabled","disabled").attr("value","&infin;");
            console.log('checked');
        } else {
            $(this).closest('.quantity').find(".input-num").removeAttr("disabled");
            console.log('none');
        }

    });

    /* tabs (begin) */
    $('.tab-list__item').click( function(){

        var i    = $(this).index(),
            tabsCont = $(this).parent('.tab-list').next('.tabs').find('.tabs__item');

        $(this).parent('.tab-list').find('.tab-list__item').removeClass('act');
        $(this).addClass('act');

        tabsCont.removeClass('opn');
        tabsCont.eq(i).addClass('opn');

        return false;
    });
    /* tabs (end) */



    $('.slider-menu').slick({
        //centerMode: true,
        swipeToSlide: true,
        infinite: true,
        slidesToShow: 1,
        variableWidth: true,
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
    });



    // меню

    var menu = $('.new-header');
    var menuTop = $('.new-header__top');
    var menuMain = $('.new-header__main');
    var menuBottom = $('.new-header__bottom');


    var basket = $('.btn-basked');
    var wBasket = basket.width();
    var marginBasket = basket.css('marginLeft');
    var shopBox = $('.shop-box');

    var toggleButton = $('.cmn-toggle-switch');


    var moveBasket = function () {
        $('.log-ext .btn-basked').animate({
            width: 0,
            marginLeft: 0
        }, 200, function () {
            basket.insertBefore('.cmn-toggle-switch');
            basket.animate({
                width: 33 + 'px',
                marginLeft: 40 + 'px'
            })
        });
    };

    var moveBackBasket = function () {
        $('.menu-row .btn-basked').animate({
            width: 0,
            marginLeft: 0
        }, 200, function () {
            basket.insertAfter('.log-ext__link--last');
            basket.animate({
                width: 33 + 'px',
                marginLeft: marginBasket
            })
        });
    };

    var hideMenu = function () {
        menu.addClass('new-header--scrolling');
        menuTop.slideUp(500);
        menuBottom.slideUp(500);
        toggleButton.removeClass('active');
    };

    var showMenu = function(){
        menu.removeClass('new-header--scrolling');
        menuTop.slideDown(500);
        menuBottom.slideDown(500);
        toggleButton.addClass('active');
    };

    // $(document).on('scroll', $.throttle(500, function () {
    //   // var posScroll = $(window).scrollTop();
    //   // var lastScrollPos;
    //   // var headingMenu = menu.height();
    //   // shopBox.slideUp(500);
    //   // if (posScroll > 0) {
    //   //
    //   // } else {
    //   //   showMenu();
    //   // }
    //   hideMenu();
    // }));

    toggleButton.on('click', function (evt) {
        var t = $(this);
        t.toggleClass('active');
        if (t.hasClass('active')) {
            showMenu();
        } else {
            hideMenu();

        }
    });


    var minValueDom = $('.slider-range__input--min');
    var maxValueDom = $('.slider-range__input--max');
    var minValue = parseInt(minValueDom.val(), 10);
    var maxValue = parseInt(maxValueDom.val(), 10);
    var sliderRange = $( ".slider-range__slider");

    sliderRange.slider({
        range: true,
        min: minValue,
        max: maxValue,
        animate: "fast",
        values: [ minValue, maxValue ],
        slide: function( event, ui ) {
            minValueDom.val( ui.values[ 0 ]);
            maxValueDom.val( ui.values[ 1 ]);
        },
        change: function( event, ui ) {
            $('.slider-range__button').slideDown(300);
        }
    });


    minValueDom.on('input', function () {
        var t = $(this);
        var changeVal = parseInt(t.val(), 10);
        sliderRange.slider( "values", 0, changeVal);
    });

    maxValueDom.on('input', function () {
        var t = $(this);
        var changeVal = parseInt(t.val(), 10);
        sliderRange.slider( "values", 1, changeVal);
    });

    var delMin = $('.slider-range__del--min');
    var delMax = $('.slider-range__del--max');

    delMin.on('click', function () {
        sliderRange.slider( "values", 0, minValue);
        minValueDom.val(minValue);
    });

    delMax.on('click', function () {
        sliderRange.slider( "values", 1, maxValue);
        maxValueDom.val(maxValue);
    });


    basket.on('click', function () {
        shopBox.slideToggle(500)
    });

    $('.slider-range__chek').on('click', function () {
        var inputChek = $('.slider-range__chek-in').is(':checked');
        var t = $(this);
        if (inputChek) {
            t.addClass('active');
        } else {
            t.removeClass('active')
        }
    });

    $('.tags-new__item').on('click', function () {
        var t = $(this);
        var inputChek = t.find('.tags-new__input').is(':checked');
        if (inputChek) {
            t.addClass('active');
        } else {
            t.removeClass('active')
        }
    });


    var filterNew = $('.filter-new');
    filterNew.on('change', function () {
        $('.slider-range__button').slideDown(300);
    });
    $('.slider-range__input').on('input', function () {
        $('.slider-range__button').slideDown(300);
    });

    $(window).on('load resize', function () {
        var w = $(this).width();
        if (w <= 800) {
            $('.two-btn').insertAfter('.slider-range');
        } else {
            $('.two-btn').insertAfter('.search');
        }
    });


});

