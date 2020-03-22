<?php

namespace PaginatorAdapter\Adapter\Builder\Test\Unit;

use Laminas\Paginator\Paginator;
use PaginatorAdapter\Adapter\Builder\PaginatorBuilder;
use PaginatorAdapter\Adapter\PaginatorAdapterInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter\Adapter\Builder
 */
class PaginatorBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function shouldCreateAnInstanceOfPaginator(): void
    {
        $builder = new PaginatorBuilder();
        $paginatorAdapter = $this->prophesize(PaginatorAdapterInterface::class);

        $paginatorAdapter
            ->getItems(Argument::type('integer'), Argument::type('integer'))
            ->willReturn(new \ArrayIterator());

        $paginatorAdapter
            ->count()
            ->willReturn(0);

        $paginator = $builder->create($paginatorAdapter->reveal());

        self::assertInstanceOf(Paginator::class, $paginator);
    }
}
