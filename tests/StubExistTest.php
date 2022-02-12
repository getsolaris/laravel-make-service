<?php

use PHPUnit\Framework\TestCase;

class MakeTest extends TestCase
{
    public function test_exist_service_stub(): void
    {
        $this->assertFileExists(
            'service.stub',
            "given filename doesn't exists"
        );
    }
}
