global.$ = global.jQuery = require('jquery');
var bootstrap = require('bootstrap');

$(function() {

    require('./modules/copy-ip');
    require('./modules/cart');

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

});