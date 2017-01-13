global.$ = global.jQuery = require('jquery');
var bootstrap = require('bootstrap');

require('datatables.net')(window, $);
require('datatables.net-bs')(window, $);

$(function() {
    require('./sidebar');

    // Load the relevant page script
    var pageLoader = {
        pages: {
            'dashboard-home': require('./home'),
            'dashboard-users': require('./users'),
            'dashboard-donations': require('./donations'),
            'dashboard-motds': require('./motd'),
            'dashboard-announcements': require('./announcements')
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