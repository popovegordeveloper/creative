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

});