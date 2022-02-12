<?php

use PHPUnit\Framework\TestCase;

class MakeFileExistTest extends TestCase
{
    public function test_console_command(): void
    {
        $this->artisan('make:service');
    }
}
