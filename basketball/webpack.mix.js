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

mix.js('resources/js/tactics.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync({proxy: 'basketball.wip',
                  reloadDebounce: 500,
                  files: [
                    'app/**/*.php',
                    'resources/views/**/*.php',
                    'resources/assets/img/**/*.png',
                    'resources/assets/img/**/*.jpg',
                    'resources/assets/img/**/*.svg',
                    'public/mix-manifest.json', 
                    'public/css/**/*.css',
                    'public/css/*.css',
                    'public/js/**/*.js',
                    'nova-components/**/dist/**/*.js',
                    'nova-components/**/dist/**/*.css'
                  ]
 });
   
if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    })
    .sourceMaps()
}
