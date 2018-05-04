<?php

use AppPackers\Bag\BagClient;
use AppPackers\LaravelBag\BagFacade;
use AppPackers\LaravelBag\BagServiceProvider;
use GrahamCampbell\TestBenchCore\FacadeTrait;

class FacadeTest extends BaseTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'bag';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return BagFacade::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return BagClient::class;
    }

    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return BagServiceProvider::class;
    }
}
