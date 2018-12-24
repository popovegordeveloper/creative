$(document).ready(function () {

    $('.order-cancel-message').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var order_id = $this.parents('form').find('input[type="hidden"]').val();
        $('#order_cancel_id').val(order_id);
        $('#order-cancel').show();
    });

    $('#order-cancel-form').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (res) {
            $('#order-cancel-close').click();
        });
    });

    $('#order-cancel-close').click(function () {
        $('#order-cancel').hide();
        $('#order-cancel-form textarea').val('');
    });

    $('.js-order-message').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        $('#order-message-user-id').val($this.data('seller'));
        $('#order-message').show();
    });

    $('#order-message-form').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (res) {
            $('#order-message-close').click();
        });
    });

    $('#order-message-close').click(function () {
        $('#order-message').hide();
        $('#order-message-form textarea').val('');
    });

    $('.js-order-tab').click(function (e) {
        e.preventDefault();
        $('.js-order-tab').removeClass('order-tab-btn__active');
        var $this = $(this);
        $this.addClass('order-tab-btn__active');
        $('.orders-body').hide();
        $("." + $this.data('class')).show()
    });

    $('#answer-button').click(function () {
        $(this).hide();
        $('#answer-form').slideDown();
    });
    $('#answer-form > form > button').click(function (e) {
        e.preventDefault();
        var $form = $(this).parents('form');
        $.post($form.attr('action'), $form.serialize(), function (res) {
            alert(res.message);
            $form.find('input, textarea').val('');
        })
    });

    var $messanger = $('.messenge-win__content');
    $messanger.scrollTop($messanger.prop('scrollHeight'));

    $(document).on('submit', '#message_form', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $text = $(this).find('textarea');
        if ($text.val() || $this.find('input[name="file"]').first().prop('files')[0]) {
            var formData = new FormData();
            formData.append('text', $text.val());
            formData.append('file', $this.find('input[name="file"]').first().prop('files')[0]);
            formData.append('user_id', $this.find('input[name="user_id"]').val());
            var btn = $(this).find('button');
            btn.prop('disabled', true);
            $('#preloader').css('opacity', '1');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $this.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function (res) {
                    res = JSON.parse(res);
                    var $messages = $('.messenge-win__content');
                    if (res.date){
                        $messages.append(
                            '<div class="messenge-win__date"><span class="messenge-win__date-t">'+ res.date + '</span></div>'
                        );
                    }
                    if (res.url){
                        $messages.append(
                            '<div class="messenge">' +
                            '<div class="messenge__top">' +
                            '<h3 class="messenge__name">Вы:</h3>' +
                            '<span class="messenge__date">'+ res.time +'</span>' +
                            '</div>' +
                            '<p class="messenge__text">'+ $text.val() + '</p>' +
                            '<a style="color: #c51f5d;" download="" href="'+ res.url +'">'+ res.filename +'</a>' +
                            '</div>'
                        );
                    } else {
                        $messages.append(
                            '<div class="messenge">' +
                            '<div class="messenge__top">' +
                            '<h3 class="messenge__name">Вы:</h3>' +
                            '<span class="messenge__date">'+ res.time +'</span>' +
                            '</div>' +
                            '<p class="messenge__text">'+ $text.val() + '</p>' +
                            '</div>'
                        );
                    }
                    var $messanger = $('.messenge-win__content');
                    $messanger.scrollTop($messanger.prop('scrollHeight'));
                    $('#preloader').css('opacity', '0');
                    btn.prop('disabled', false);
                    btn.removeProp('disabled');
                    $text.val('');
                }
            });
        } else {
            console.log('message not send');
        }
    });

    // $('#new-message-btn').click(function (e) {
    //     e.preventDefault();
    //     var $form = $(this).parents('form');
    //     $.post($form.attr('action'), $form.serialize());
    //     $('.mfp-close').click();
    // });

    $('.multiselect').select2({
        placeholder: "Доступные цвета товара",
        // width: '100%',
        theme: "flat",
        // allowClear: true
    });

    $('.multiselect').on('select2:opening select2:closing', function( event ) {
        var $searchfield = $(this).parent().find('.select2-search__field');
        $searchfield.attr('placeholder', 'Доступные цвета товара');
        // $searchfield.prop('disabled', true);
        // $searchfield.hide();
    });

    $('.multiselect').on('select2:close', function( event ) {
        var $searchfield = $(this).parent().find('.select2-search__field');
        $searchfield.attr('placeholder', 'Доступные цвета товара');
        // $searchfield.prop('disabled', true);
        // $searchfield.hide();
    });

    $('.multiselect').on('select2:open', function( event ) {
        $('.select2-container--open').css('width', $('.select2-selection__rendered').css('width'));
        var top = $('.select2-selection__rendered').outerHeight() + $('.select2-container--open').position().top + "px";
        $('.select2-container').last().css({top: top});
    });

    $('.multiselect').on('select2:select', function( event ) {
        $('.multiselect').select2('open');
    });

    $(document).on('click', '.select2-selection__choice__remove', function () {
        $('.multiselect').select2('close');
    });

    $('.popup-js').magnificPopup({
        preloader: false,
        items: {
            src: $('#popup-js'),
            type: 'inline'
        },
        callbacks: {
            open: () => {
                $('#popup-js').show();
            },
            close: () => {
                $('#popup-js').hide();
            }
        }
    });

    $('.js-add-favorite').click(function (e) {
        e.preventDefault();
        var $form = $('#one-product').length ? $('#one-product') : $(this).find('form');
        var url = '/product/add-favorite';
        var message = "Товар добавлен в избранное";
        if ($(this).hasClass('fav-active')) {
            $(this).removeClass('fav-active');
            url = '/product/delete-favorite';
            message = "Товар удален из избранного";
        } else {
            $(this).addClass('fav-active');
        }
        $.post(url, $form.serialize());
        $('.message-popup').show();
        $('.message-popup').css('opacity', 1);
        $('.message-popup p').text(message);
        setTimeout(function () {
            $('.message-popup').css('opacity', 0);
            setTimeout(function () {
                $('.message-popup').hide();
            }, 500);
        }, 1000);
    });

    $('.js-del-favorite').click(function (e) {
        e.preventDefault();
        var $form = $(this).find('form');
        $.post($form.attr('action'), $form.serialize());
        $(this).parents('.my-card').remove();
    });

    $('.js-del-product').click(function (e) {
        e.preventDefault();
        var $form = $(this).find('form');
        $.post($form.attr('action'), $form.serialize());
        $(this).parents('.my-card').remove();
    });

/****************************************************************************/
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

    $('.info-i__input-num, .info-i__select, .ur-form__select, .messenge-win__file, .delivery__checkbox, .select, .input-num, .quantity__any input, .message-btn').styler();
    $('#popup-js form input[type="file"]').styler();
    $('.settings-shop__logo').styler({
        fileBrowse: 'Лого'
    });
    $('.settings-shop__obloj').styler({
        fileBrowse: 'Загрузить обложку'
    });
    // $('.goods-photo-add').styler({
    //     fileBrowse: 'Перетащите или выберите фотографии'
    // });


    // $(document).on("keydown", ".price-n-discount__value input", function(event) {
    //     var str = $(this).val().toString();
    //
    //     console.log(str);
    //     if ($(this).val() < 1 ) $(this).val(1);
    //     if ($(this).val() > 99999) $(this).val(99999);
    // });

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
        // menuTop.slideUp(500);
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


  // добавление изображение при создании и радактивровании магазина
  function readURL(input, el) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        //$(el).attr('src', e.target.result);
        $(el).css({
          backgroundImage: 'url('+ e.target.result + ')',
          backgroundSize: 'cover',
          backgroundPosition: 'center'
        })
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#shopLogo").change(function() {
    readURL(this, '#shopLogo-styler');
  });

  $("input.settings-shop__obloj").change(function() {
    readURL(this, '#shopBanner');
  });
  $("#masterLogo").change(function() {
    readURL(this, '#masterLogo-styler');
  });
  $('.color-item').styler();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  //выбор диалога
    $(document).on('click', '.mesenger__item', function (e) {
        e.preventDefault();
        $conversation_id = $(this).find('input').val();
        $.post('/message/conversation', {id: $conversation_id}, function (res) {
            res = JSON.parse(res);
            var $messanger = $('.mesenger__mesenj-win');
            $messanger.html('');
            $messanger.append(
                '<div class="messenge-win">' +
                '<div class="messenge-win__content">' +
                '<div class="messenge-win__top">' +
                '<h3 class="messenge-win__name"></h3>' +
                '</div>' +
                '</div>' +
                '<form action="/message/create" class="messenge-win__form" method="post" style="height: auto" enctype="multipart/form-data" id="message_form">' +
                '<input type="hidden" name="user_id" value="">' +
                '<textarea name="text" class="messenge-win__input" placeholder="Напишите сообщение..."></textarea>' +
                '<div class="jq-file messenge-win__file"><div class="jq-file__name">Файл не выбран</div><div class="jq-file__browse">Обзор...</div><input type="file" class="messenge-win__file" name="file"></div>' +
                '<button style="display: inline-block; vertical-align: top; background: transparent; border: none; padding-left: 40px; color: #c36; cursor: pointer" class="mesenger__button">Отправить</button>' +
                '<div id="preloader" style="background-image: url(/img/preloader.gif); height: 40px; width: 50px; background-position: center; background-size: cover; display: inline-block; opacity: 0" width="30" height="30"></div>' +
                '</form>' +
                '</div>'
            );

            $messanger.find('input[name="user_id"]').val(res.companion.id);
            var companion_name = "";
            if (res.companion.surname) companion_name += res.companion.surname + " ";
            if (res.companion.name) companion_name += res.companion.name + " ";
            if (res.companion.patronymic) companion_name += res.companion.patronymic + " ";

            $('.messenge-win__name').text(companion_name);
            var $mes_screen = $('.messenge-win__content');
            var messages = res.messages;
            for (var date in messages){

                // дата
                var norm_date = '';
                var date_arr = date.split(' ');
                for (var i = 0; i < date_arr.length; i++){
                    norm_date += date_arr[i].length < 2 ? "0" + date_arr[i] : date_arr[i];
                    if (i != date_arr.length - 1) norm_date += ".";
                }
                //***************

                $mes_screen.append('<div class="messenge-win__date"><span class="messenge-win__date-t">' + norm_date + '</span></div>');
                for (var i = 0; i < messages[date].length; i++) {
                    var name =  messages[date][i].user_id == res.companion.id ? companion_name + ":" : "Вы :";

                    var time = messages[date][i].created_at.split(' ')[1].split(':');
                    time = time[0] + ":" + time[1];

                    $mes_screen.append(
                        '<div class="messenge">' +
                        '<div class="messenge__top">' +
                        '<h3 class="messenge__name">' + name + '</h3>' +
                        '<span class="messenge__date">'+ time +'</span>'+
                        '</div>' +
                        '<p class="messenge__text">' + messages[date][i].text +'</p>'+
                        '</div>'
                    );
                }
            }
            $mes_screen.scrollTop($mes_screen.prop('scrollHeight'));
        });
    });

    $('#sex_wooman').on('change', function (e) {
        $('#sex_man').removeAttr('checked');
        $('#sex_man').parents('.js-sex-setting').removeClass('checked');
        $("#sex_man").prop('checked',false);
    });

    $('#sex_man').on('change', function (e) {
        $('#sex_wooman').removeAttr('checked');
        $('#sex_wooman').parents('.js-sex-setting').removeClass('checked');
        $("#sex_wooman").prop('checked',false);
    });

});
