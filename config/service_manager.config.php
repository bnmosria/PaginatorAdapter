<?php

return [
    'aliases'   => [
        \PaginatorAdapter\Adapter\PaginatorAdapterInterface::class => \PaginatorAdapter\Adapter\PaginatorAdapter::class,
    ],
    'factories' => [
        \PaginatorAdapter\Adapter\PaginatorAdapter::class         => \Laminas\ServiceManager\Factory\InvokableFactory::class,
        \PaginatorAdapter\Adapter\Builder\PaginatorBuilder::class => \Laminas\ServiceManager\Factory\InvokableFactory::class,
    ],
];
