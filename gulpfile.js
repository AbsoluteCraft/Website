var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/style.css');
    mix.sass('status.scss', 'public/css/status.css');
    mix.sass('dashboard/dashboard.scss', 'public/css/dashboard.css');

    mix.browserify('app.js', 'public/js/script.js');
    mix.browserify('dashboard/dashboard.js', 'public/js/dashboard.js');

    mix.browserSync({
        proxy: 'local.ac',
        open: false
    });
});
