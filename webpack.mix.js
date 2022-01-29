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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();

mix
    .sass('resources/scss/auth/auth.scss', 'public/css/auth.css')
    .js('resources/js/auth/auth.js', 'public/js/auth.js')
    .sass('resources/scss/frontend/core.scss', 'public/css/frontend.core.css')
    .sass('resources/scss/frontend/main.scss', 'public/css/frontend.main.css')
    .sass('resources/scss/frontend/header-spaceship-variant-one.scss', 'public/css/frontend.header.css')
    .sass('resources/scss/frontend/header-mobile-variant-one.scss', 'public/css/frontend.mobile.css')

    .js('resources/js/frontend/core.js', 'public/js/frontend.core.js')
    .js('resources/js/frontend/main.js', 'public/js/frontend.main.js')
    .js('resources/js/frontend/number.js', 'public/js/frontend.number.js')

    .sass('resources/scss/backend/backend.scss', 'public/css/backend.css')
    .js('resources/js/backend/backend.js', 'public/js/backend.js')
    .js('resources/js/backend/sweetalert2.js', 'public/js/backend.sweetalert2.js')
    .copy('node_modules/datatables.net-dt/css/jquery.dataTables.css', 'public/css/backend.datatable.css')
    .copy('node_modules/datatables.net/js/jquery.dataTables.js', 'public/js/backend.datatable.js');

//mix.copy('resources/vendors/pace-progress/css/pace.min.css', 'public/css');
//mix.copy('node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css', 'public/css');
//mix.copy('node_modules/cropperjs/dist/cropper.css', 'public/css');

//************** SCRIPTS ******************
// general scripts
// mix.copy('node_modules/axios/dist/axios.min.js', 'public/js');
//mix.copy('node_modules/pace-progress/pace.min.js', 'public/js');

// views scripts
// mix.copy('node_modules/chart.js/dist/Chart.min.js', 'public/js');
// mix.copy('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js', 'public/js');

// mix.copy('node_modules/cropperjs/dist/cropper.js', 'public/js');
// details scripts
// mix.copy('resources/js/coreui/main.js', 'public/js');
// mix.copy('resources/js/coreui/colors.js', 'public/js');
// mix.copy('resources/js/coreui/charts.js', 'public/js');
// mix.copy('resources/js/coreui/widgets.js', 'public/js');
// mix.copy('resources/js/coreui/popovers.js', 'public/js');
// mix.copy('resources/js/coreui/tooltips.js', 'public/js');
// details scripts admin-panel
// mix.js('resources/js/coreui/menu-create.js', 'public/js');
// mix.js('resources/js/coreui/menu-edit.js', 'public/js');
// mix.js('resources/js/coreui/media.js', 'public/js');
// mix.js('resources/js/coreui/media-cropp.js', 'public/js');
//*************** OTHER ******************
//fonts
// mix.copy('node_modules/@coreui/icons/fonts', 'public/fonts');
// //icons
// mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public/css');
// mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public/css');
// mix.copy('node_modules/@coreui/icons/css/flag.min.css', 'public/css');
// mix.copy('node_modules/@coreui/icons/svg/flag', 'public/svg/flag');
//
// mix.copy('node_modules/@coreui/icons/sprites/', 'public/icons/sprites');
//images
// mix.copy('resources/assets', 'public/assets');


if (mix.inProduction()) {
    mix.version();
}
