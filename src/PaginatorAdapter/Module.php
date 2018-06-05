<?php

namespace PaginatorAdapter;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 *
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package PaginatorAdapter
 */
class Module implements ConfigProviderInterface
{

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}