<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 24-Oct-18
 * Time: 2:13 PM
 */

namespace App\Common;


interface ICommandInflector
{
    function getCommandHandlerClass($command);
    function getCommandValidatorClass($command);
}
