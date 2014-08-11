<?php namespace Larabook;

use Illuminate\Support\ServiceProvider;

class LarabookServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
    * Array of IoC bindings
    *
    * @var array
    */
    private $bindings = [

    ];

    /**
    * Array of helper files, usually only one but allows for multiple files
    *
    * @var array
    */
    private $helpers = [
        'Larabook/helpers.php'
    ];

    private $commands = [
        'larabook.foo' => 'Larabook\Console\FooCommand'
    ];

    public function boot()
    {
        $this->loadFilters();
        $this->loadRoutes();
        $this->loadHelpers();
        $this->loadCommands();
    }

    public function register()
    {
        $this->registerBindings();
    }

    private function loadFilters()
    {
        require __DIR__.'/filters.php';
    }

    private function loadRoutes()
    {
        require __DIR__.'/routes.php';
    }

    private function registerBindings()
    {
        foreach($this->bindings as $key => $val)
        {
            $this->app->bind($key, $val);
        }
    }

    private function loadHelpers()
    {
        foreach($this->helpers as $helper)
        {
            require app_path() . '/' . $helper;
        }
    }

    private function loadCommands()
    {
        foreach($this->commands as $command => $class)
        {
            $this->app->bindShared($command, function($app) use ($class)
            {
                return $app->make($class);
            });

            $this->commands($command);
        }
    }

}
