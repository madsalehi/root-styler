let mix = require('laravel-mix');
const js_input = "root-styler/assets/src/js/app.js";
const js_output = "root-styler/assets/js/app.js";
const sass_in = "root-styler/assets/src/sass/app.scss";
const sass_out = "root-styler/assets/css/app.css";
mix.babel(js_input,js_output)
    .sass(sass_in,sass_out).options({
    processCssUrls: false
});