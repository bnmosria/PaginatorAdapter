<?php

namespace PaginatorAdapter\Adapter\Builder;

use Laminas\Paginator\Adapter\AdapterInterface;
use Laminas\Paginator\Paginator;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter\Adapter\Builder
 */
class PaginatorBuilder
{
    /**
     * Create db adapter service
     *
     * @param AdapterInterface $doctrinePaginatorAdapter
     *
     * @return Paginator
     */
    public function create(AdapterInterface $doctrinePaginatorAdapter): Paginator
    {
        return new Paginator($doctrinePaginatorAdapter);
    }
}
