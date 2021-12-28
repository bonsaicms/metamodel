# Metamodel for Bonsai CMS

## Installation

You can install the package via composer:

```bash
composer require bonsaicms/metamodel
php artisan migrate
```

### Configuration

You can publish the config file with:

```bash
php artisan vendor:publish --tag="bonsaicms-metamodel-config"
```

This is the contents of the published config file:

```php
return [
];
```

### Migrations

If you want to customize the migrations, you can publish them with:

```bash
php artisan vendor:publish --tag="bonsaicms-metamodel-migrations"
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
