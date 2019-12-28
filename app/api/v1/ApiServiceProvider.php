<?php namespace Api;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    private $bindings = [
        //'Path/To/FooRepository' => 'Path/To/FooRepositoryInterface'
    ];

    private $helpers = [
        'api/v1/helpers.php'
    ];

    public function boot()
    {
        $this->loadRoutes();
        $this->loadFilters();
        $this->loadHelpers();
    }

    public function register()
    {
        $this->registerBindings();
    }

    private function registerBindings()
    {
        foreach ($this->bindings as $key => $val) {
            $this->app->bind($key, $val);
        }
    }

    private function loadHelpers()
    {
        foreach ($this->helpers as $helper) {
            require app_path() . '/' . $helper;
        }
    }

    private function loadFilters()
    {
        require __DIR__.'/filters.php';
    }

    private function loadRoutes()
    {
        require __DIR__.'/routes.php';
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    // public function provides()
    // {
    //     return array();
    // }
}
