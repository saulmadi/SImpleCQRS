<?php

namespace App\Providers;

use App\Common\CommandInflector;
use App\Common\ICommandBus;
use App\Common\ICommandInflector;
use App\Common\IEventDispatcher;
use App\Common\SynchronousCommandBus;
use App\Common\SynchronousEventDispatcher;
use App\Common\UnitOfWorkCommandBus;
use App\Common\ValidationCommandBus;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->singleton(ICommandBus::class, SynchronousCommandBus::class);
        $this->app->singleton(IEventDispatcher::class, SynchronousEventDispatcher::class);
        $this->app->singleton(ICommandInflector::class, CommandInflector::class);
        $container = $this->app;

        $this->app->extend(ICommandBus::class, function (ICommandBus $service) use ($container) {
            return new ValidationCommandBus($service, Container::getInstance(), $container->make(CommandInflector::class));
        });

        $this->app->extend(ICommandBus::class, function (ICommandBus $service) {
            return new UnitOfWorkCommandBus($service);
        });




    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
