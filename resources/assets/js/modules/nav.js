var $header = $('.header');
var $menu = $('.menu');

var open = function() {
    $menu.addClass('active');
    $header.addClass('nav-open');

    window.setTimeout(function() {
        $header.addClass('nav-show');
    }, 300);
};

var close = function() {
    $header.removeClass('nav-show');

    window.setTimeout(function() {
        $header.removeClass('nav-open');
        $menu.removeClass('active');
    }, 300);
};

$menu.click(function() {
    if($header.hasClass('nav-open')) {
        close();
    } else {
        open();
    }
});