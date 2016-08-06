$('.btn-cart').popover({
        trigger : 'click',
        placement : 'bottom',
        html: 'true',
        title: 'Cart',
        content : 'Cart is empty',
        template:
            '<div class="popover popover-cart">' +
                '<div class="arrow"></div>'+
                '<h3 class="popover-title"></h3>' +
                '<div class="popover-content"></div>' +
                '<div class="popover-footer">' +
                    '<button type="button" class="btn btn-primary btn-sm popover-submit">Checkout</button>&nbsp;'+
                    '<a href="cart" class="btn btn-default btn-sm">View Cart</a>' +
                '</div>' +
            '</div>'
    })
    .on('shown', function() {
        $('.popover-textarea').val($(this).text()).focus();
        //update link text on submit
        $('.popover-submit').click(function() {
            $(this).text($('.popover-textarea').val());
            $(this).popover('hide');
        });
    });