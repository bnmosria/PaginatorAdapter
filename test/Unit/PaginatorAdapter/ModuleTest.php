<?php

namespace PaginatorAdapter\Test\Unit;

use PaginatorAdapter\Module;
use PHPUnit\Framework\TestCase;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter
 */
class ModuleTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnAnArray(): void
    {
        self::assertIsArray((new Module())->getConfig());
    }


    /**
     * @test
     */
    public function shouldReturnAnArrayWithConfig(): void
    {
        self::assertArrayHasKey('service_manager', (new Module())->getConfig());
    }
}
