const mix = require('laravel-mix');

mix.styles([
    'resources/assets/front/css/bootstrap.css',
    'resources/assets/front/css/font-awesome.min.css',
    'resources/assets/front/style.css',
    'resources/assets/front/css/animate.css',
    'resources/assets/front/css/responsive.css',
    'resources/assets/front/css/colors.css',
    'resources/assets/front/css/version/marketing.css',
], 'public/assets/front/css/main.css');

mix.scripts([
    'resources/assets/front/js/jquery.min.js',
    'resources/assets/front/js/tether.min.js',
    'resources/assets/front/js/bootstrap.min.js',
    'resources/assets/front/js/animate.js',
    'resources/assets/front/js/custom.js',
], 'public/assets/front/js/main.js');

mix.copyDirectory('resources/assets/front/images', 'public/assets/front/images');
mix.copyDirectory('resources/assets/front/fonts', 'public/assets/front/fonts');
mix.copyDirectory('resources/assets/front/upload', 'public/assets/front/upload');
