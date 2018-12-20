$(document).ready(function () {
    $("#js-back-step1").click(function (e) {
        e.preventDefault();
        $('.step1').click();
    });

    $("#js-back-step2").click(function (e) {
        e.preventDefault();
        $('.step2').click();
    });

    $("select.js-item-delivery").change(function () {
        var $cost = $(this).parents('.cart-item__data').find('.js-item-price-delivery');
        $cost.text($(this).find('option:selected').data('cost') + '₽');
    });

    $('#add_to_cart').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (resp) {
            $('.js-cart-count').text(resp.qty);
            $('.js-cart-small').html(resp.html);
        });
    });

    $(document).on('click', '.js-add-to-cart',function (e) {
        e.preventDefault();
        $.post($(this).attr('href'),{product_id: $(this).data('product')}, function (resp) {
            $('.js-cart-count').text(resp.qty);
            $('.js-cart-small').html(resp.html);
        });
    });

    $(document).on('click', '.js-add-from-cart .plus',function (e) {
        e.preventDefault();
        var $this = $(this).parents('.js-add-from-cart');
        $.post('/cart/plus',{cart_row_id: $this.data('row')}, function (resp) {
            $('.js-cart-count').text(resp.qty);
            $('.js-cart-small').html(resp.html);
            $this.parents('.cart-item').find('.cart-item__price').text(resp.price + " ₽");
            $('.js-total-price').text(resp.total + " ₽");
        });
    });

    $(document).on('click', '.js-add-from-cart .minus',function (e) {
        e.preventDefault();
        var $this = $(this).parents('.js-add-from-cart');
        $.post('/cart/minus',{cart_row_id: $this.data('row')}, function (resp) {
            $('.js-cart-count').text(resp.qty);
            $('.js-cart-small').html(resp.html);
            $this.parents('.cart-item').find('.cart-item__price').text(resp.price + " ₽");
            $('.js-total-price').text(resp.total + " ₽");
        });
    });

    $(document).on('click', '.js-remove-item-cart', function (e) {
        e.preventDefault();
        var $this = $(this);
        $.post($this.attr('href'), {cart_row_id: $this.data('row')}, function (resp) {
            $('.js-cart-small').html(resp.html);
            $('.js-cart-count').text(resp.qty)
        });
    });

    $(document).on('click', '.js-cart-remove-item', function (e) {
        e.preventDefault();
        var $this = $(this);
        $.post($this.attr('href'), {cart_row_id: $this.data('row')}, function (resp) {
            $('.js-cart-small').html(resp.html);
            $('.js-cart-count').text(resp.qty);
            $this.parents('.cart-item').remove();
            if ($('.cart-item').length == 0) {
                $('.js-cart-total').remove();
                $('.js-cart-sep1-buttons').remove();
                $('.lk__tab-item_2.step2').remove();
                $('.js-cart-step1-desc').text('На данный момент товары отсутствуют');
            }
        });
    });

    $(document).on('click', '.js-cart-delete-all', function (e) {
        e.preventDefault();
        var $this = $(this);
        $.post($this.attr('href'), null, function (resp) {
            $('.js-cart-small').html(resp.html);
            $('.js-cart-count').text(resp.qty)
        });
    });

});