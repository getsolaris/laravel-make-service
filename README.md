<p align="center">

[![Latest Stable Version](http://poser.pugx.org/getsolaris/laravel-make-service/v)](https://packagist.org/packages/getsolaris/laravel-make-service) [![Monthly Downloads](http://poser.pugx.org/getsolaris/laravel-make-service/d/monthly)](https://packagist.org/packages/getsolaris/laravel-make-service)
[![Total Downloads](http://poser.pugx.org/getsolaris/laravel-make-service/downloads)](https://packagist.org/packages/getsolaris/laravel-make-service)
[![License](http://poser.pugx.org/getsolaris/laravel-make-service/license)](https://packagist.org/packages/getsolaris/laravel-make-service)
[![PHP Version Require](http://poser.pugx.org/getsolaris/laravel-make-service/require/php)](https://packagist.org/packages/getsolaris/laravel-make-service)

</p>

# A MVCS pattern create a service command for Laravel 5+
Create a new service class and service interface

# Install
```bash
composer require getsolaris/laravel-make-service --dev
```

# Suggest
getsolaris.kr@gmail.com


# Usage
```bash
$ php artisan make:service {name : Create a service class} {--i : Optional of create a service interface}
```

# Example

## Create a service class
```bash
$ php artisan make:service UserService
```

```php
<?php
// app/Http/Services/UserService.php

namespace App\Services;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{

}
```

## + Optional service interface

```
v1.0.x -> contract
v1.1.x -> interface
```

```bash
$ php artisan make:service UserService --i
```

```php
<?php
// app/Http/Services/Contracts/UserServiceInterface.php

namespace App\Services\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{

}

```
