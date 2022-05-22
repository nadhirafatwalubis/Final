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

mix.js('resources/js/backend-wrapper.js', 'public/backend/js/app.js')
    .sass('resources/sass/backend-wrapper.scss', 'public/backend/css/app.css')
    .sourceMaps();

mix.js('resources/js/frontend-wrapper.js', 'public/frontend/js/app.js')
    .sass('resources/sass/frontend-wrapper.scss', 'public/frontend/css/app.css')
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
