<?php

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithConsole;
use Tests\CreatesApplication;

/**
 * @property \Illuminate\Contracts\Container\Container $app
 */
class GenerateTest extends TestCase
{
    use CreatesApplication, InteractsWithConsole;

    protected $app;

    public function setUp(): void
    {
        parent::setUp();
        $this->app = require __DIR__ . '/../../bootstrap/app.php';
    }

    /**
     * @return void
     */
    public function test_make_service_command(): void
    {
        $this->artisan('make:service TestService')->assertSuccessful();
    }

    /**
     * @return void
     */
    public function test_make_service_to_interface_command(): void
    {
        $this->artisan('make:service TestService --i')->assertSuccessful();
    }
}
