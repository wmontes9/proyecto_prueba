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

mix.scripts([
    'resources/js/axios.js',
    'resources/js/bootstrap.min.js',
    'resources/js/bootstrap.js',
    'resources/js/jquery.min.js',
    'resources/js/popper.min.js',
    'resources/js/vue.js',
    'resources/js/vue_form_wizard.js',
 ],'public/js/app.js'). styles([
    'resources/css/bootstrap.min.css',
    'resources/css/vue_form_wizard.css',
 ],'public/css/app.css');