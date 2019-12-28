<?php namespace Larabook;

use Illuminate\Support\ServiceProvider;

class LarabookServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the service provider is defered
     * @var boolean $defer
     */
    protected $defer = false;

    /**
     * Array of bindings for the IoC
     * @var array $bindings
     */
    private $bindings = [

    ];

    /**
     * Array of helper files to load
     * @var array $helpers
     */
    private $helpers = [
        'Larabook/helpers.php'
    ];

    /**
     * Array of Larabook specific commands to register
     * @var array $commands
     */
    private $commands = [
        'larabook.foo' => 'Larabook\Console\FooCommand'
    ];

    /**
     * A listing of events to register listeners for
     * @var array $events
     */
    private $events = [
        'Larabook.Commanding.Registration.Events.UserRegistered' => 'Larabook\EventHandlers\EmailNotifier'
    ];

    /**
     * The boot method runs automatically
     * @return void
     */
    public function boot()
    {
        $this->loadFilters();
        $this->loadRoutes();
        $this->loadHelpers();
        $this->loadCommands();
    }

    /**
     * The register method for bindings, event listeners, etc.
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->registerEventListeners();
    }

    /**
     * Require the filters.php file
     * @return void
     */
    private function loadFilters()
    {
        require __DIR__.'/filters.php';
    }

    /**
     * Require the routes.php file
     * @return void
     */
    private function loadRoutes()
    {
        require __DIR__.'/routes.php';
    }

    /**
     * Register class bindings in the IoC
     * @return void
     */
    private function registerBindings()
    {
        foreach ($this->bindings as $key => $val) {
            $this->app->bind($key, $val);
        }
    }

    /**
     * Require any helper files
     * @return void
     */
    private function loadHelpers()
    {
        foreach ($this->helpers as $helper) {
            require app_path() . '/' . $helper;
        }
    }

    /**
     * Bind any Larabook specific commands
     * @return void
     */
    private function loadCommands()
    {
        foreach ($this->commands as $command => $class) {
            $this->app->bindShared($command, function ($app) use ($class) {
                return $app->make($class);
            });

            $this->commands($command);
        }
    }

    /**
     * Register event listeners
     * @return void
     */
    private function registerEventListeners()
    {
        foreach ($this->events as $event => $eventClass) {
            $this->app['events']->listen($event, $eventClass);
        }
    }
}
