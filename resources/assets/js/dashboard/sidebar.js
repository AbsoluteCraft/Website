var navCollapse = localStorage.getItem('nav-collapse');
if(navCollapse == 1) {
    $('body').addClass('nav-collapse');
}

$('.button-menu-mobile').click(function() {
    $('body').toggleClass('nav-collapse');

    localStorage.setItem('nav-collapse', $('body').hasClass('nav-collapse') ? 1 : 0);
});