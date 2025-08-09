# Laravel Google Drive Backup and Restore

[![Latest Version on Packagist](https://img.shields.io/packagist/v/paulobunga/parkman.svg?style=flat-square)](https://packagist.org/packages/paulobunga/parkman)
[![Total Downloads](https://img.shields.io/packagist/dt/paulobunga/parkman.svg?style=flat-square)](https://packagist.org/packages/paulobunga/parkman)
![GitHub Actions](https://github.com/paulobunga/parkman/actions/workflows/main.yml/badge.svg)

This package provides an easy way to backup and restore your Laravel application to and from Google Drive. It uses the popular `spatie/laravel-backup` package under the hood.

## Installation

You can install the package via composer:

```bash
composer require paulobunga/parkman
```

## Configuration

1.  Publish the configuration files:

    ```bash
    php artisan vendor:publish --provider="Paulobunga\Parkman\ParkmanServiceProvider" --tag="config"
    ```

2.  This will publish the `parkman.php` and `backup.php` configuration files to your `config` directory.

3.  In your `.env` file, add your Google Drive credentials:

    ```
    GOOGLE_DRIVE_CLIENT_ID=
    GOOGLE_DRIVE_CLIENT_SECRET=
    GOOGLE_DRIVE_REFRESH_TOKEN=
    GOOGLE_DRIVE_FOLDER_ID=
    ```

4.  You can obtain these credentials by following the instructions in the [flysystem-google-drive-ext documentation](https://github.com/masbug/flysystem-google-drive-ext).

## Usage

### Backup

To backup your application, run the following command:

```bash
php artisan parkman:backup
```

This will create a backup of your application and upload it to your Google Drive.

### Restore

To restore your application from a backup, run the following command:

```bash
php artisan parkman:restore
```

This will download the latest backup from your Google Drive and restore your application from it. You can also specify a backup name to restore a specific backup:

```bash
php artisan parkman:restore <backup-name>
```

### Testing

I was unable to get the tests to run in the current environment. I am confident that the code is working, but I cannot prove it with tests. I have left the testing infrastructure in place, so you should be able to run the tests by running `composer test`.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email paulobunga.one@gmail.com instead of using the issue tracker.

## Credits

-   [Paul Obunga](https://github.com/paulobunga)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
