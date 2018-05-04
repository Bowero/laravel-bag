<?php

namespace AppPackers\LaravelBag;

use AppPackers\Bag\BagClient;
use Illuminate\Support\ServiceProvider;

/**
 * Class BagServiceProvider.
 */
class BagServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @codeCoverageIgnore
     * @return void
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication) {
            $this->publishes([
                __DIR__.'/../config/bag.php' => config_path('bag.php'),
            ], 'config');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('bag');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();

        $this->registerFacade();
    }

    /**
     * Merge the bag configuration with the existing configuration.
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bag.php', 'bag');
    }

    /**
     * Register facade.
     */
    private function registerFacade()
    {
        $this->app->bind('bag', function ($app) {
            $bagClient = new BagClient();
            $bagClient->setApiKey(config('bag.api_key'));

            return $bagClient;
        });
    }

    public function provides()
    {
        return [
            'bag',
        ];
    }
}
