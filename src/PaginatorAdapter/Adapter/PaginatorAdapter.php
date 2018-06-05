<?php

namespace PaginatorAdapter\Adapter;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Zend\Paginator\Adapter\AdapterInterface;

/**
 * Class PaginatorAdapter
 *
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter\Adapter
 */
class PaginatorAdapter implements AdapterInterface
{
    /**
     * @var Paginator
     */
    protected $paginator;

    /**
     * @var int
     */
    protected $count;

    /**
     * @param int $offset
     * @param int $itemCountPerPage
     *
     * @return \ArrayIterator
     */
    public function getItems($offset, $itemCountPerPage): \ArrayIterator
    {
        return $this->paginator->getIterator();
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->count;
    }

    /**
     * @param Paginator $paginator
     */
    public function setPaginator(Paginator $paginator): void
    {
        $this->paginator = $paginator;
        $this->count = count($paginator);
    }
}