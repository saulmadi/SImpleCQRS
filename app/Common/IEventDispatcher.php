<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 24-Oct-18
 * Time: 12:27 PM
 */

namespace App\Common;


interface IEventDispatcher
{
    function dispatch(IDomainEvent $event);
}
