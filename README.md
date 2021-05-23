<p align="center">
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/license.svg" alt="License"></a>
</p>

# A MVCS pattern create a service command for Laravel 5+
Create a new service class

# Install
```bash
composer require getsolaris/laravel-make-service
```

# Usage
```php
// config/app.php
'providers' => [
    Getsolaris\LaravelMakeService\LaravelMakeServiceProvider::class,
];
```

```bash
php artisan make:service {name}
```
