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

mix.webpackConfig({
    resolve: {
        modules: ['node_modules'],
        alias: {
            '@': 'resources/js',
            'balm-ui-plus': 'balm-ui/dist/balm-ui-plus.js',
            'balm-ui-css': 'balm-ui/dist/balm-ui.css',
        },
    },
});

mix.ts('resources/js/main.ts', 'public/js').vue({ version: 3 });
mix.sass('resources/scss/main.scss', 'public/css');
mix.extract();
