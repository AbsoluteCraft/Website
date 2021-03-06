global.$ = global.jQuery = require('jquery');
var bootstrap = require('bootstrap');
var instantclick = require('instantclick');

$(function() {

    // The location hash changes on shop.js seem to mess with InstantClick
    if(window.location.href.indexOf('/shop') == -1) {
        instantclick.init();
    }

    require('./modules/nav');
    require('./modules/copy-ip');
    require('./modules/notify-ip');
    require('./modules/cart');
    require('./modules/sticky-help');

    // Load the relevant page script
    var pageLoader = {
        pages: {
            home: require('./pages/home'),
            player: require('./pages/player'),
            shop: require('./pages/shop')
        },
        init: function() {
            for(var p in pageLoader.pages) {
                if(typeof pageLoader.pages[p].load == 'undefined') {
                    for(var q in pageLoader.pages[p]) {
                        pageLoader.load(q, pageLoader.pages[p][q]);
                    }
                } else {
                    pageLoader.load(p, pageLoader.pages[p]);
                }
            }
        },
        load: function(name, page) {
            if($('main').hasClass(name)) {
                page.load();
            }
        }
    };
    pageLoader.init();

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

});