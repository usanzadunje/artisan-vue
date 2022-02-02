# Generate templates for Vue resources.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/usanzadunje/artisan-vue.svg?style=flat-square)](https://packagist.org/packages/usanzadunje/artisan-vue)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/usanzadunje/artisan-vue/run-tests?label=tests)](https://github.com/usanzadunje/artisan-vue/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/usanzadunje/artisan-vue/Check%20&%20fix%20styling?label=code%20style)](https://github.com/usanzadunje/artisan-vue/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/usanzadunje/artisan-vue.svg?style=flat-square)](https://packagist.org/packages/usanzadunje/artisan-vue)

Multiple templates for your Vue application resources.

Generates components, views, composables(hooks), services and Vuex modules. All paths are easily configurable using config file.

## Installation

You can install the package via composer:

```bash
composer require usanzadunje/artisan-vue
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="artisan-vue-config"
```

This is the contents of the published config file:

```php
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
```

## Usage

```bash
# Generates template for specific resource
php artisan vue:make {resource} {path}

# Path can be file name(without extension) or path to the file along with its name
# Examples: 

# 1. generates Test.vue in your components directory
php artisan vue:make component Test 

# 2. generates testing folder as well as Test.vue file inside your component directory
php artisan vue:make component testing/Test 

# Lists all resources available for creation
php artisan vue:list
```

Command will take root of your Vue application (which you can specify in config file) append resource folder name (also in config file) and then try and create following:

- All directories you provided in `path` if they do not exist
- File itself (last portion of the path is considered file name) with appropriate extension for that resource

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Dusan Djordjevic](https://github.com/usanzadunje)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
