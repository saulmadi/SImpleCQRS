<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 30-Oct-18
 * Time: 5:29 PM
 */

namespace App\Common\Scopes;


use App\Common\Repository;

interface IQueryScope
{
    function apply(Repository $repositoryContract);
}
