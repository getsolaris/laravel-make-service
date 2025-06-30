# Laravel Make Service

[![Latest Stable Version](http://poser.pugx.org/getsolaris/laravel-make-service/v)](https://packagist.org/packages/getsolaris/laravel-make-service)
[![Total Downloads](http://poser.pugx.org/getsolaris/laravel-make-service/downloads)](https://packagist.org/packages/getsolaris/laravel-make-service)
[![Monthly Downloads](http://poser.pugx.org/getsolaris/laravel-make-service/d/monthly)](https://packagist.org/packages/getsolaris/laravel-make-service)
[![License](http://poser.pugx.org/getsolaris/laravel-make-service/license)](https://packagist.org/packages/getsolaris/laravel-make-service)
[![PHP Version Require](http://poser.pugx.org/getsolaris/laravel-make-service/require/php)](https://packagist.org/packages/getsolaris/laravel-make-service)

Laravel 애플리케이션에서 MVCS (Model-View-Controller-Service) 패턴을 구현하기 위한 서비스 클래스를 생성하는 Artisan 명령어를 제공하는 Laravel 패키지입니다.

## 개요

이 패키지는 Laravel 애플리케이션에서 서비스 레이어 클래스 생성을 간소화합니다. 비즈니스 로직을 컨트롤러에서 분리하여 클린 아키텍처를 유지하도록 도와주며, 코드를 더 유지보수하기 쉽고, 테스트 가능하며, 재사용 가능하게 만들어줍니다.

## 요구사항

- PHP 7.1 이상
- Laravel 5.6.34 이상 (Laravel 12까지 지원)

## 설치

Composer를 통해 패키지를 설치합니다:

```bash
composer require getsolaris/laravel-make-service --dev
```

패키지는 Laravel의 패키지 자동 검색 기능을 사용하여 자동으로 등록됩니다.

## 사용법

### 기본 명령어 구문

```bash
php artisan make:service {name} {--i : 서비스 인터페이스 생성}
```

### 서비스 클래스 생성

간단한 서비스 클래스를 생성하려면:

```bash
php artisan make:service UserService
```

이 명령은 `app/Services/UserService.php`에 서비스 클래스를 생성합니다:

```php
<?php

namespace App\Services;

class UserService
{
    //
}
```

### 인터페이스와 함께 서비스 생성

서비스 클래스와 해당 인터페이스를 함께 생성하려면:

```bash
php artisan make:service UserService --i
```

이 명령은 두 개의 파일을 생성합니다:

1. **서비스 클래스** `app/Services/UserService.php`:
```php
<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    //
}
```

2. **인터페이스** `app/Services/Interfaces/UserServiceInterface.php`:
```php
<?php

namespace App\Services\Interfaces;

interface UserServiceInterface
{
    //
}
```

## 실제 예제

### 서비스 구현 예제

```php
<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    /**
     * 새로운 사용자 생성
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        return DB::transaction(function () use ($data) {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        });
    }

    /**
     * 사용자 정보 업데이트
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function updateUser(User $user, array $data): bool
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $user->update($data);
    }

    /**
     * 사용자 통계 조회
     *
     * @param User $user
     * @return array
     */
    public function getUserStatistics(User $user): array
    {
        return [
            'posts_count' => $user->posts()->count(),
            'comments_count' => $user->comments()->count(),
            'last_login' => $user->last_login_at,
        ];
    }
}
```

### 컨트롤러에서 서비스 사용하기

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->userService->createUser($request->validated());

        return response()->json([
            'message' => '사용자가 성공적으로 생성되었습니다',
            'user' => $user
        ], 201);
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $this->userService->updateUser($user, $request->validated());

        return response()->json([
            'message' => '사용자가 성공적으로 업데이트되었습니다',
            'user' => $user->fresh()
        ]);
    }

    public function statistics(User $user): JsonResponse
    {
        $stats = $this->userService->getUserStatistics($user);

        return response()->json($stats);
    }
}
```

## 기여하기

기여를 환영합니다! 자유롭게 Pull Request를 제출해주세요.

## 지원

문제를 발견하거나 질문이 있으시면 [이슈를 생성](https://github.com/getsolaris/laravel-make-service/issues)해주세요.

## 작성자

- **Solaris** - [getsolaris](https://github.com/getsolaris)
- 이메일: getsolaris.kr@gmail.com

## 라이선스

이 패키지는 [MIT 라이선스](https://opensource.org/licenses/MIT) 하에 오픈소스 소프트웨어입니다.