const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/custom.js', 'public/js')
   .css('resources/css/custom.css', 'public/css')
   .css('resources/css/bootstrap.min.css', 'public/css')
   .sass('resources/sass/app.scss', 'public/css');
