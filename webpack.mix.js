let mix = require('laravel-mix');
const js_input = "root-styler/assets/src/js/app.js";
const js_output = "root-styler/assets/js/app.js";
mix.babel(js_input,js_output);