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
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    mix.sass('admin.scss', 'public/css/admin.css')
        .copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js');

    mix.sass('frontend.scss', 'public/css/frontend.css');
    mix.scripts(['jquery-2.2.2.min.js', 'jquery-ui.min.js', 'jquery.imagemapster.js', 'nano.js'], 'public/js/libraries.js')
        .scripts(['script.js'], 'public/js/frontend.js');
});