global.$ = global.jQuery = require('jquery');
var bootstrap = require('bootstrap');

$(function() {
    require('./sidebar');

    // Load the relevant page script
    var pageLoader = {
        pages: {
            'dashboard-home': require('./home'),
            'dashboard-motds': require('./motd')
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