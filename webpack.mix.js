const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');
require('laravel-mix-svg-vue');

mix
  .js('resources/js/app.js', 'public/js')
  .js('resources/js/main.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/main.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')]
  })
  .svgVue();

if (mix.inProduction()) {
  mix.purgeCss().version();
}
