# View database table information from Laravel CLI (Artisan)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/resohead/laravel-cli-schema.svg?style=flat-square)](https://packagist.org/packages/resohead/laravel-cli-schema)

A small Laravel package to show basic database tables and column information from an Artisan command.

## Installation

You can install the package via composer:

```bash
composer require resohead/laravel-cli-schema {--dev}
```

## Usage

Get all tables and columns
```bash
php artisan schema:table
```

Get a list of all tables
```bash
php artisan schema:table --list
```

Get a column information for a table
```bash
php artisan schema:table --name=users
```

Get a column information for a table via prompt with select list
```bash
php artisan schema:table --name=

Select a table:
> users
```

Get a column information for a model
```bash
php artisan schema:table --model=App\\User
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email s.white9904@gmail.com instead of using the issue tracker.

## Credits

- [resohead](https://github.com/resohead)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.