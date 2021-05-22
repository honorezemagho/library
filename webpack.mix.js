const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue()
  .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .autoload({
        'jquery': ['$', 'window.jQuery', 'jQuery']
    })
    .copyDirectory('node_modules/alpinejs/dist/alpine.js', 'public/dist/js')
    .copyDirectory('resources/json', 'public/dist/json')
    .copyDirectory('resources/fonts', 'public/dist/fonts')
    .copyDirectory('resources/images', 'public/dist/images')
    .copyDirectory('node_modules/slick-carousel/slick/ajax-loader.gif', 'public/dist/css')
    .copyDirectory('node_modules/summernote/dist/font/summernote.woff', 'public/dist/fonts/summernote')
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
