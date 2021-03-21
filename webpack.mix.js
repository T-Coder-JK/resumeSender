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

mix.react("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/card_section.scss", "public/css/component")
    .sass("resources/sass/blog_editor.scss", "public/css/component")
    .sass(
        "resources/sass/style_mini_components/ani_input.scss",
        "public/css/component"
    )
    .sass("resources/sass/profiles/profile.scss", "public/css/profiles")
    .js("resources/js/profiles/panghao.js", "public/js/profiles");
