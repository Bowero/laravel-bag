<?php

use AppPackers\LaravelBag\BagFacade;
use AppPackers\LaravelBag\BagServiceProvider;
use Orchestra\Testbench\TestCase;

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
