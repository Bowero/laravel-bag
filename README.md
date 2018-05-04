# Laravel-BAG

[![Build Status](https://travis-ci.org/app-packers/laravel-bag.svg?branch=master)](https://travis-ci.org/app-packers/laravel-bag)
[![Style Status](https://styleci.io/repos/132171375/shield?branch=master&style=flat)](https://styleci.io/repos/132171375)

Laravel-BAG incorporates an easy to use package for retrieving address information from [Basisregistraties Adressen en Gebouwen](https://bag.basisregistraties.overheid.nl/) (BAG) into your [Laravel](https://laravel.com/) or [Lumen](https://lumen.laravel.com/) project.

## Requirements

* PHP 7.1

## Installation

Add Laravel-BAG to your [Composer](https://getcomposer.org/) file via the `composer require` command:

```bash
$ composer require app-packers/laravel-bag
```

Or add it to `composer.json` manually:

```json
"require": {
    "app-packers/laravel-bag": "1.0.0"
}
```

### Laravel

Laravel 5.5+ will use its [auto-discovery](https://laravel.com/docs/5.5/packages#package-discovery) functionality.

In Laravel 5.4 (or if you are not using auto-discovery) register the service provider by adding it to the `providers` key in `config/app.php`. Also register the facade by adding it to the `aliases` key in `config/app.php`.

```php
'providers' => [
    ...
    AppPackers\LaravelBag\BagServiceProvider::class,
],

'aliases' => [
    ...
    'Bag' => AppPackers\LaravelBag\BagFacade::class,
]
```

### Lumen

Register the provider in your bootstrap app file `bootstrap/app.php`.

Add the following line in the "Register Service Providers" section at the bottom of the file.
```php
$app->register(\AppPackers\LaravelBag\BagServiceProvider::class);
```

Optional: Register the facade, add the following line in the section "Create The Application". (Do not forget to enable `$app->withFacades();`)
```php
class_alias(\AppPackers\LaravelBag\BagFacade::class, 'Bag');
```

### Configuration

To get started, you'll need to set the API key for the Basisregistraties Adressen en Gebouwen in the `.env` file:

    BAG_API_KEY=XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX

You can request an API key by the [Basisregistraties Adressen en Gebouwen](https://bag.basisregistraties.overheid.nl/).

You also may want to publish all vendor assets (Laravel only):

    $ php artisan vendor:publish --provider="AppPackers\LaravelBag\BagServiceProvider"

This will create a `config/bag.php` file in your Laravel application that you can modify to set your configuration.

## Usage

Here you can see an example of just how simple this package is to use.

    $bagAddress = Bag::getAddressByZipcodeAndStreetNumber('7311KZ', 110);

### Result

```php
BagAddress {
  -street: "Hofstraat"
  -streetNumber: 110
  -city: "Apeldoorn"
  -zipCode: "7311KZ"
}
```

## Licence

This library is open-sourced software licensed under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0).