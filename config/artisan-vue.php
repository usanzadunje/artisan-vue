<?php
/*
 * Configuration file for Artisan Vue package
 *
 * Here you can specify name of the directories where certain Vue assets live.
 * This names will be used to store content created by the package.
 */
return [
    // Root directory where your Vue app lives
    'vue_root_dir' => resource_path("js"),

    // Name of the folder which stores views
    'views_dir' => 'views',

    // Name of the folder which stores components
    'components_dir' => 'components',

    // Name of the folder which stores composables(hooks)
    'composables_dir' => 'composables',

    // Path to the folder which stores Vuex modules
    'vuex-modules_dir' => 'store/modules',

    // Name of the folder which stores services
    'services_dir' => 'services',
];
