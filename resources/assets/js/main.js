$(document).ready(function () {
    $(window).on('load', function () {
       var hd = $('.header').innerHeight();
       $('.header').css({height: "" + hd + "px"});
    });
    $(window).on("scroll load resize", function(){
        $(' .filter__tags').removeClass('active');

        if ($(window).scrollTop() > 0) {

            $('.header').addClass('header_scroll');
            $('.header').removeClass('header_normal');
            $('body').addClass('scroll');
            $('.login__item_corzina').appendTo('.header__main');
            //$('.filter').css({display: 'none'}).removeClass('filter_show')

            if($(window).width() > 662) {
                //console.log($(window).width())
                $('.filter').css({display: 'none'}).removeClass('filter_show')
            }

        }
        else {

            $('.header').removeClass('header_scroll');
            $('body').removeClass('scroll');

            $('.login__item_corzina').appendTo('.login');

            if (!$('body').is('.hide-filter')) {
                $('.filter').css({display: 'block'});
            }
            $('.header').addClass('header_normal');


        }

        if($(window).width() < 992) {
            $('.login__item_corzina').appendTo('.header__main');
        }
    });


    $('.header__razdel, .filter__close').click( function () {
        $('.filter').toggleClass('filter_show');
        // var hd2 = $('.header').innerHeight();
        // $('.header').removeClass('header_scroll');
        // if($(window).width() > 992) {
        //     $('.header').toggleClass('header_show');
        // }
        //$('.header').toggleClass('header_show')
    });

    $('.cashfilter-form').change(function () {
        $('.cashfilter-form__button').addClass('cashfilter-form__button_active');
    });
    $('.cashfilter-form__input').on('edit', function() {
        $('.cashfilter-form__button').addClass('cashfilter-form__button_active');

    });


       $('.tags-carusel').owlCarousel({
           loop: false,
           dots: false,
           //center: true,
           autoWidth: true,
           nav: true,
           navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
           margin: 20,
           autoplay: false,
           autoplayHoverPause: true,
           responsive:{
               0:{
                   items:4
               },
               600:{
                   items:5
               },
               1000:{
                   items:11
               }
           }
       });


    $('.slider').owlCarousel({
        loop: false,
        dots: false,
        // center: true,
        //autoWidth: true,
        nav: true,
        navText: [],
        //margin: 20,
        autoplay: true,
        autoplayHoverPause: true,
        //autoWidth: true,
        items: 1
    });

    $('.content__wrapper').masonry({
        // options
        itemSelector: '.card',
        gutter: 30,
        fitWidth: true
        // columnWidth: 200
    });
    $('#carousel1').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 87,
        itemMargin: 5,
        asNavFor: '#slider1'
    });

    $('#slider1').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel1"
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
    $('.tags__link').on('click', function (e) {
       e.preventDefault();
       var active = $(this).hasClass('tags__link_active');

       if (active === false) {
           $(this).addClass('tags__link_active').append('<span class="tags__close"></span>');

           // var text = $('.tags__link_active').text(function (text, index) {
           //     return index;
           // });
           // $('.header__razdel_item').text(text)
           // console.log(text)
       } else {
           $(this).removeClass('tags__link_active');
           $(this).find('.tags__close').remove();
       }
    });

    // $('.calendar-js').minical({
    //     read_only: false
    //     // date_format: function(date) {
    //     //     return [date.getDate(), date.getMonth() + 1, date.getFullYear()].join("/");
    //     // }
    // });$('.calendar-js').minical({
    //     read_only: false
    //     // date_format: function(date) {
    //     //     return [date.getDate(), date.getMonth() + 1, date.getFullYear()].join("/");
    //     // }
    // });

    $('.login__link_prof').on('click',function (e) {
        if($(window).width()>992) {
            e.preventDefault();
            $('.login__item_modal').toggle(300);
            $('.shop-box').hide(200);
        } else {
            location.href = $(this).attr('href');
        }
    });
    $('.login__link_shop').click(function (e) {
        if($(window).width()>992) {
            e.preventDefault();
            $('.shop-box').toggle(300);
            $('.login__item_modal').hide(200);
        } else {
            location.href = $(this).attr('href');
        }
    });

    function windowSize(){
        if($(window).width() < 992){
            $('.filter').css({display: 'none'})
            $('.login').prependTo('.filter__wrapper');
            $('.create-shop').prependTo('.filter__wrapper');
        }else{

            $('.login').appendTo('.header__topbar-wrapper');
            $('.create-shop').appendTo('.header__main');


        }
    }
    $(window).on('load resize scroll',windowSize);




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

    $('.login__link_prof').click(function (e) {
       e.preventDefault();
    });
    // $('.slider-main').owlCarousel({
    //     items: 1,
    //     thumbs: true,
    //     thumbImage: true,
    //     //autoWidth: true,
    //     nav: true,
    //     navText: [],
    //     autoplay: true,
    //     autoplayHoverPause: true
    // });

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

        if(currentLength > maximumLength && event.keyCode != 8) {
            event.preventDefault();
            return false;
        }
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







    




    // ползунок фильтра цен
    var html5Slider = document.getElementById('slider');

    noUiSlider.create(html5Slider, {
        start: [ 0, 15000 ], //значения по умолчанию
        connect: true,
        range: {   //
            'min': 0,
            'max': 15500
        }
    });
    //console.log(html5Slider.range.min)
    // $('#left-res').on('click', function () {
    //     $('#input-number').val(html5Slider.range.min);
    // });
    // $('#rig-res').on('click', function () {
    //
    // });


    var inputNumber = document.getElementById('input-number');
    var inputNumber2 = document.getElementById('input-number2');

    html5Slider.noUiSlider.on('update', function( values, handle ) {
        var value1 = $('#input-number').val();
        var value12 = $('#input-number2').val();

        //console.log(value1);
        var value = values[handle];
        //console.log(value);
        //console.log(handle);
        //console.log(values);
        if ( handle ) {
            inputNumber2.value = Math.round(value);

            // inputNumber2.value = value;
           //$('.cashfilter-form__button').addClass('cashfilter-form__button_active');
        }
        else {
            inputNumber.value = Math.round(value);
            $('.cashfilter-form__button').addClass('cashfilter-form__button_active');
        }
    });
    $('.cashfilter-form__reset').on('click', function () {
        html5Slider.noUiSlider.reset();
    });
    inputNumber.addEventListener('change', function(){
        html5Slider.noUiSlider.set([this.value, null]);
    });
    inputNumber2.addEventListener('change', function(){
        html5Slider.noUiSlider.set([null, this.value]);

    });



});



// сорян тот кто будет смотреть весь этот бардак, у меня не было тз правки в дезайн вносли во время верстки. вот как то так