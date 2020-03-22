<?php

namespace PaginatorAdapter\Adapter;

use ArrayIterator;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Exception;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter\Adapter
 */
class PaginatorAdapter implements PaginatorAdapterInterface
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
     * @return ArrayIterator
     * @throws Exception
     */
    public function getItems(
        $offset,
        $itemCountPerPage
    ): ArrayIterator {
        return $this->paginator->getIterator();
    }

    public function count(): int
    {
        return $this->count;
    }

    public function setPaginator(Paginator $paginator): void
    {
        $this->paginator = $paginator;
        $this->count = count($paginator ?? []);
    }
}
