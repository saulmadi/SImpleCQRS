<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 30-Oct-18
 * Time: 7:36 PM
 */

namespace App\Common\Scopes;


use App\Common\Repository;

interface SearchField
{
    function build($search, Repository $repositoryContract);
}
