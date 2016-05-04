global.$ = global.jQuery = require('jquery');
var bootstrap = require('bootstrap');

$(function() {

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

});