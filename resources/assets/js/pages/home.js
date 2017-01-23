var lazyframe = require('lazyframe');

module.exports = {
    load: function () {
        var elements = $('.lazyframe');
        lazyframe(elements, {
            apikey: 'AIzaSyDu_FM9jmhzdLOXnUMScIH9SaqTBYmv8Kg'
        });
    }
};