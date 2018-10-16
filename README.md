<p align="center">
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/license.svg" alt="License"></a>
</p>

# Introduction
Laravel MVCS Pattern Create a new Service Class

# Install
```bash
composer require getsolaris/laravel-make-service
```

# Usage
```php
// config/app.php
'providers' => [
    getsolaris\LaravelCreateService\CreateServiceProvider::class,
];
```
 
```bash
php artisan vendor:publish --provider="getsolaris\LaravelCreateService\CreateServiceProvider"
```

```bash
php artisan make:service {name}
```