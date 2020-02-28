<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 24-Oct-18
 * Time: 2:58 PM
 */

namespace App\Common;


use HaydenPierce\ClassFinder\ClassFinder;
use Illuminate\Container\Container;


class SynchronousEventDispatcher implements IEventDispatcher
{
    /**
     * @var Container
     */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    function dispatch(IDomainEvent $event)
    {
        $nameSpace = str_replace('Events', 'EventHandlers', get_class($event));

        $eventHandlers = ClassFinder::getClassesInNamespace($nameSpace);
        foreach ($eventHandlers as $subscriber) {
            $this->container->make($subscriber)->handle($event);
        }
    }
}
