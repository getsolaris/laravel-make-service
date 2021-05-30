<p align="center">
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/getsolaris/laravel-make-service"><img src="https://poser.pugx.org/getsolaris/laravel-make-service/license.svg" alt="License"></a>
<a href="https://github.styleci.io/repos/153322909?branch=master"><img src="https://github.styleci.io/repos/153322909/shield?branch=master" alt="StyleCI"></a>
</p>

# A MVCS pattern create a service command for Laravel 5+
Create a new service class and service contract

# Install
```bash
composer require getsolaris/laravel-make-service
```

# Usage
```bash
$ php artisan make:service {name : Create a service class} {--c : Optional of create a service contract}
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

## + Optional service contract
```bash
$ php artisan make:service UserService --c
```

```php
<?php
// app/Http/Services/Contracts/UserServiceContract.php

namespace App\Services\Contracts;

/**
 * Interface UserServiceContract
 * @package App\Services\Contracts
 */
interface UserServiceContract
{

}

```
