// noinspection JSUnresolvedFunction
let mix = require('laravel-mix');

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

// noinspection JSUnresolvedFunction
mix
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/modal.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/market.scss', 'public/css')
    .sass('resources/assets/sass/storage.scss', 'public/css')
    .sass('resources/assets/sass/style.scss', 'public/css')
    .copyDirectory('resources/assets/img', 'public/img');
