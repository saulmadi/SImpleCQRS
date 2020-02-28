<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 26-Oct-18
 * Time: 1:59 AM
 */

namespace App\Common;


use Illuminate\Support\Facades\DB;

class UnitOfWorkCommandBus implements  ICommandBus
{
    /**
     * @var ICommandBus
     */
    private $commandBus;

    /**
     * UnitOfWorkCommandBus constructor.
     * @param ICommandBus $commandBus
     */
    public function __construct(ICommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    function execute(ICommand $command)
    {
        $bus = $this->commandBus;
        return DB::transaction(function () use ($command, $bus){
            return $bus->execute($command);
        });
    }
}
