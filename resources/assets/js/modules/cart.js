var $cart = $('.popover-cart');

$('.btn-cart').popover({
        trigger : 'click',
        placement : 'bottom',
        html: 'true',
        title: 'Cart',
        content : $('.popover-cart-content'),
        template: $cart
    })
    .on('shown.bs.popover', function() {
        $(window).on('click', handleWindowClick);

        $('.popover-cart').on('click', function(e) {
            e.stopPropagation();
        });
    })
    .on('hidden.bs.popover', function() {
        $(window).off('click', handleWindowClick);
    });

var handleWindowClick = function() {
    $('.btn-cart').popover('hide');
};

$('#dropdown-user').click(handleWindowClick);