<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 24-Oct-18
 * Time: 3:59 PM
 */

namespace App\Common;


class CommandInflector implements  ICommandInflector
{

    function getCommandHandlerClass($command)
    {
     return str_replace('Commands','CommandHandlers', get_class($command)) . 'Handler';
    }

    function getCommandValidatorClass($command)
    {
        return str_replace('Commands','Validators', get_class($command)) . 'Validator';
    }

}
