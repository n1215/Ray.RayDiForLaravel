<?php

namespace Ray\RayDiForLaravel;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use Ray\Di\InjectorInterface;

class RayDiServiceProvider extends ServiceProvider
{
    private InjectorInterface $injector;

    public function __construct($app, InjectorInterface $injector)
    {
        parent::__construct($app);
        $this->injector = $injector;
    }

    public function register()
    {
        $this->app->instance('router', new RayRouter($this->app['events'], $this->app, $this->injector));
    }
}
