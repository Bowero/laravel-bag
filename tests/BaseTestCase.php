<?php

use Orchestra\Testbench\TestCase;
use AppPackers\LaravelBag\BagFacade;
use AppPackers\LaravelBag\BagServiceProvider;

abstract class BaseTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            BagServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Bag' => BagFacade::class,
        ];
    }
}
