<?php

namespace PaginatorAdapter\Adapter\Factory;

use PaginatorAdapter\Adapter\PaginatorAdapter;
use Zend\Paginator\Paginator;

/**
 * Class ZendPaginatorFactory
 *
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter\Adapter\Factory
 */
class ZendPaginatorFactory
{
    /**
     * Create db adapter service
     *
     * @param PaginatorAdapter $doctrinePaginatorAdapter
     *
     * @return Paginator
     */
    public function create(PaginatorAdapter $doctrinePaginatorAdapter): Paginator
    {
        return new Paginator($doctrinePaginatorAdapter);
    }
}