<?php

namespace Algorit\ServiceManager;

use Closure;
use Exception;
use RuntimeException;
use Illuminate\Contracts\Container\Container;

class Manager
{
    /**
     * The container instance.
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * The list of services.
     *
     * @var array
     */
    protected $services = [];

    /**
     * Create a new manager instance.
     *
     * @param \Illuminate\Container\Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Get all services.
     *
     * @return array
     */
    private function getServices()
    {
        return $this->services;
    }

    /**
     * Try to call all services in sequence.
     *
     * @param  Closure $callback
     * @return mixed
     */
    public function execute(Closure $callback)
    {
        foreach ($this->getServices() as $service) {
            try {
                return $callback($this->container->make($service));
            } catch (Exception $e) {
                // Move on
            }
        }

        throw new RuntimeException('Could not execute any service.');
    }
}
