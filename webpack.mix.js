let mix = require('laravel-mix');
var path = require('path');

var glob = require('glob');
let PurifyCSSPlugin = require('purifycss-webpack');

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

mix.js('resources/assets/js/app.js', 'public/assets')
   .js('resources/assets/js/users/login.js', 'public/users/assets')
   .sass('resources/assets/sass/app.scss', 'public/css');


mix.styles('resources/assets/css/styles.css', 'public/css/styles.css');

    new PurifyCSSPlugin({
      // Give paths to parse for rules. These should be absolute!
      paths: glob.sync(path.join(__dirname, 'resources/views/**/*.blade.php')),

    })
