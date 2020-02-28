<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 24-Oct-18
 * Time: 11:09 AM
 */


namespace App\Common;

interface ICommandBus
{
    function execute(ICommand $command);
}
