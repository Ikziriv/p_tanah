let mix = require('laravel-mix');
let webpack = require('webpack');

mix.js([
    'node_modules/popper.js/dist/umd/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/js/app.js'], 'public/js/app.js')
    .extract(['lodash', 'jquery', 'axios', 'bootstrap', 'popper.js'])
    .webpackConfig({
        plugins: [
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery',
                'window.jQuery': 'jquery',
                Popper: ['popper.js', 'default'],
            })
        ]
    })
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version();
