var el = $('.sticky-help');
var menu = $('.sticky-help__menu');

var sh = {
    module: null,
    page: null,
    refresh: function() {
        $('.sticky-help__page').css('display', 'none');
        $('.sticky-help__page[data-sh-page-name="' + sh.page + '"]').css('display', 'block');

        $('[data-sh-module]').removeClass('active');
        $('[data-sh-module="' + sh.module + '"]').addClass('active');
    },
    setPage: function(module, page) {
        if(!page) {
            page = module;
        }

        sh.module = module;
        sh.page = page;
        sh.refresh();
    },
    open: function() {
        el.addClass('expanded');
        $('[data-sh-group="' + sh.module + '"]').addClass('active');
    },
    close: function() {
        el.removeClass('expanded');
        $('[data-sh-group="' + sh.module + '"]').removeClass('active');
    }
};

$('[data-sh-module]').click(function(e) {
    e.preventDefault();

    sh.setPage($(this).data('sh-module'));
    sh.open();
});
$('[data-sh-page]').click(function(e) {
    e.preventDefault();

    sh.setPage($(this).data('sh-group'), $(this).data('sh-page'));
    sh.open();
});
$('.sticky-help__close a').click(function(e) {
    e.preventDefault();

    sh.close();
});
$('[data-sh-close]').click(function() {
    sh.close();
});