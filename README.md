# Permission Package

In your Laravel application -> `composer.json` file

```
    {
        "require": {
            "lyden/permission": "^1.0.0"
        }
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/lydenchai/Laravel-Package"
            }
        ],
    }
```

## Install

To install through Composer, by run the following command:

```
composer require lyden/permission
```

The package will automatically register itself.

Add the following to the `providers` array in `config/app.php`. This provider must be **registered as the last service provider** on the `providers` array:

```
Lyden\Permission\PermissionServiceProvider::class,
Lyden\Permission\RouteServiceProvider::class,
```

You can publish the migration with:

```
php artisan vendor:publish --provider="Lyden\Permission\PermissionServiceProvider" --tag='migrations'
```

After publishing the migration you can create the permission table by running the migrations:

```
php artisan migrate
```

Optionally, publish the package's configuration file by running:

```
php artisan vendor:publish --provider="Lyden\Permission\PermissionServiceProvider"
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
