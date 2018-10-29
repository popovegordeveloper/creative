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

    $(document).on('click', '.js-remove-item-cart', function (e) {
        e.preventDefault();
        var $this = $(this);
        $.post($this.attr('href'), {cart_row_id: $this.data('row')}, function (resp) {
            $('.js-cart-small').html(resp.html);
            $('.js-cart-count').text(resp.qty)
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