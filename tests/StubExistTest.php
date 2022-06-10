<?php

use PHPUnit\Framework\TestCase;

class StubExistTest extends TestCase
{
    /**
     * @return void
     */
    public function test_exist_service_stub(): void
    {
        $this->assertFileExists(__DIR__ . '/../src/Stubs/service.stub');
    }

    /**
     * @return void
     */
    public function test_exist_interface_stub(): void
    {
        $this->assertFileExists(__DIR__ . '/../src/Stubs/interface.stub');
    }

    /**
     * @return void
     */
    public function test_exist_service_interface_stub(): void
    {
        $this->assertFileExists(__DIR__ . '/../src/Stubs/service.interface.stub');
    }
}
