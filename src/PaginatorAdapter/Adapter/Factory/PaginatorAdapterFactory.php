<?php

namespace PaginatorAdapter\Adapter\Factory;

use PaginatorAdapter\Adapter\PaginatorAdapter;
use Interop\Container\ContainerInterface;

/**
 * Class PaginatorAdapterFactory
 *
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter\Adapter\Factory
 */
class PaginatorAdapterFactory
{
    /**
     * Create service
     *
     * @param ContainerInterface $container
     *
     * @return PaginatorAdapter
     */
    public function __invoke(ContainerInterface $container): PaginatorAdapter
    {
        return new PaginatorAdapter();
    }
}