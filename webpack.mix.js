const mix = require('laravel-mix');
const path = require('path');

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

mix.webpackConfig({
    resolve: {
        symlinks: false,
        modules: ['node_modules'],
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
    watchOptions: {
        ignored: /node_modules/,
    },
});

mix.js('resources/js/main.js', 'public/js').vue({ version: 3 });
mix.sass('resources/scss/main.scss', 'public/css');
mix.extract(['vue', 'axios']);
