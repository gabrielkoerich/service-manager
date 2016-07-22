<?php

use Illuminate\Container\Container;

class ManagerTest extends PHPUnit_Framework_TestCase
{
    public function testServices()
    {
        $manager = new ManagerStub(new Container);

        $manager->execute(function ($service) {
            $this->assertEquals($service->doSomething(), 'done');
        });
    }
}
