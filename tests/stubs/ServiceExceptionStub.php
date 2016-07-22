<?php

class ServiceExceptionStub implements ServiceStubInterface
{
    public function doSomething()
    {
        throw new Exception;
    }
}
