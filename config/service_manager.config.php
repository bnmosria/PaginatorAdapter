<?php

return [
    'factories' => [
        \PaginatorAdapter\Adapter\PaginatorAdapter::class             => \PaginatorAdapter\Adapter\Factory\PaginatorAdapterFactory::class,
        \PaginatorAdapter\Adapter\Factory\ZendPaginatorFactory::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
    ],
];
