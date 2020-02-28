<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 24-Oct-18
 * Time: 2:02 PM
 */

namespace App\Common;


use Illuminate\Container\Container;
use RII\Common\Exceptions\GeneralException;

class SynchronousCommandBus implements ICommandBus
{
    /**
     * @var Container
     */
    private $container;
    /**
     * @var ICommandInflector
     */
    private $commandInflector;

    /**
     * CommandBus constructor.
     * @param Container $container
     * @param ICommandInflector $commandInflector
     */
    public function __construct(Container $container, ICommandInflector $commandInflector)
    {
        $this->container = $container;
        $this->commandInflector = $commandInflector;
    }

    public function execute(ICommand $command)
    {
        return $this->resolveHandler($command)->handle($command);
    }

    public function resolveHandler($command)
    {
        $comandHandler = $this->commandInflector->getCommandHandlerClass($command);
        if(!class_exists($comandHandler))
            throw new \Exception('The command handler' .  $comandHandler . ' do not exist');

        $resolvedHandler = $this->container->make($comandHandler);

        return $resolvedHandler;
    }
}
