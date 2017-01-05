if(localStorage.getItem('notify-ip') == null) {
    localStorage.setItem('notify-ip', 1);

    $('.btn-copy-ip').popover({
        title: 'Join us on Minecraft',
        content: 'Click here to copy our server IP!',
        placement: 'bottom',
        trigger: 'manual'
    });

    window.setTimeout(function() {
        $('.btn-copy-ip').popover('show');

        window.setTimeout(function() {
            $('.btn-copy-ip').popover('hide');
        }, 3000);
    }, 2000);
}