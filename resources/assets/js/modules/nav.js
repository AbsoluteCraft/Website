var header = document.querySelector('.header');
var menu = document.querySelector('.menu');

var open = function() {
    menu.classList.add('active');
    header.classList.add('nav-open');

    window.setTimeout(function() {
        header.classList.add('nav-show');
    }, 300);
};

var close = function() {
    header.classList.remove('nav-show');

    window.setTimeout(function() {
        header.classList.remove('nav-open');
        menu.classList.remove('active');
    }, 300);
};

menu.addEventListener('click', function() {
    if(header.classList.contains('nav-open')) {
        close();
    } else {
        open();
    }
});