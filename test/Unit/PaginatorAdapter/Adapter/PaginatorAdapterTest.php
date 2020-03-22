<?php

namespace PaginatorAdapter\Adapter\Test\Unit;

use Doctrine\ORM\Tools\Pagination\Paginator;
use PaginatorAdapter\Adapter\PaginatorAdapter;
use PHPUnit\Framework\TestCase;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter\Adapter
 */
class PaginatorAdapterTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnAnInstanceOfArrayIterator(): void
    {
        $adapter = new PaginatorAdapter();

        $paginator = $this->prophesize(Paginator::class)
            ->willImplement(\Countable::class)
            ->willImplement(\IteratorAggregate::class);

        $paginator->count()
            ->willReturn(0);

        $paginator->getIterator()
            ->willReturn(new \ArrayIterator());

        $adapter->setPaginator($paginator->reveal());

        self::assertInstanceOf(\ArrayIterator::class, $adapter->getItems(5, 10));
    }

    /**
     * @test
     */
    public function shouldReturnTheCorrectAmountOfItems(): void
    {
        $adapter = new PaginatorAdapter();

        $paginator = $this->prophesize(Paginator::class)
            ->willImplement(\Countable::class)
            ->willImplement(\IteratorAggregate::class);

        $paginator->count()
            ->willReturn(10);

        $adapter->setPaginator($paginator->reveal());

        self::assertSame(10, $adapter->count());

    }
}
