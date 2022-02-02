<?php
/*
 * Configuration file for Artisan Vue package
 *
 * Here you can specify name/path of the directories where certain Vue resources live.
 * This names will be used to store content created by the package.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Path to Vue root
    |--------------------------------------------------------------------------
    |
    | Path to your Vue application root folder, where resources will live.
    |
    */
    'vue_root_dir' => resource_path("js"),

    /*
    |--------------------------------------------------------------------------
    | Name of the views directory
    |--------------------------------------------------------------------------
    |
    | Name of the directory which stores your views.
    |
    */
    'views_dir' => 'views',

    /*
    |--------------------------------------------------------------------------
    | Name of the components directory
    |--------------------------------------------------------------------------
    |
    | Name of the directory which stores your components.
    |
    */
    'components_dir' => 'components',

    /*
    |--------------------------------------------------------------------------
    | Name of the composables(hooks) directory
    |--------------------------------------------------------------------------
    |
    | Name of the directory which stores your composables(hooks).
    |
    */
    'composables_dir' => 'composables',

    /*
    |--------------------------------------------------------------------------
    | Path to the modules directory
    |--------------------------------------------------------------------------
    |
    | Path to directory which stores your Vuex modules,
    | relative to `vue_root_dir` specified above.
    |
    */
    'vuex-modules_dir' => 'store/modules',

    /*
    |--------------------------------------------------------------------------
    | Name of the services directory
    |--------------------------------------------------------------------------
    |
    | Name of the directory which stores your services.
    |
    */
    'services_dir' => 'services',
];
