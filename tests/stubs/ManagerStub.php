<?php

use Algorit\ServiceManager\Manager;

class ManagerStub extends Manager
{
    /**
     * The list of services.
     *
     * @var array
     */
    protected $services = [
        ServiceExceptionStub::class,
        ServiceStub::class,
    ];
}
