const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.babel([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
], 'public/js/core.js')
    .sass('resources/sass/core.scss', 'public/css')
    .sass('resources/sass/page/auth.scss', 'public/css')
    .sass('resources/sass/page/app.scss', 'public/css')
    .babel(['resources/js/auth.js'], 'public/js/auth.js')
    .babel(['resources/js/app.js'], 'public/js/app.js');