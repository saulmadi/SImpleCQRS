<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25-Oct-18
 * Time: 2:09 PM
 */

namespace App\Common;


use Illuminate\Container\Container;
use RII\Common\Exceptions\GeneralException;

class ValidationCommandBus implements ICommandBus
{
    /**
     * @var ICommandBus
     */
    private $commandBus;
    /**
     * @var Container
     */
    private $container;
    /**
     * @var ICommandInflector
     */
    private $commandInflector;

    /**
     * ValidationCommandBus constructor.
     * @param ICommandBus $commandBus
     * @param Container $container
     */
    public function __construct(ICommandBus  $commandBus, Container $container, ICommandInflector $commandInflector)
    {
        $this->commandBus = $commandBus;
        $this->container = $container;
        $this->commandInflector = $commandInflector;
    }

    function execute(ICommand $command)
    {
        $validatorClass = $this->commandInflector->getCommandValidatorClass($command);
        if(!class_exists($validatorClass)){
            throw new \Exception('Validator ' . $validatorClass . ' no encontrado');
        }

        $this->container->make($validatorClass)->validate($command);

        return $this->commandBus->execute($command);
    }
}
