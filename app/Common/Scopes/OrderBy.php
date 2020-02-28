<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 7/11/2018
 * Time: 12:22 PM
 */

namespace App\Common\Scopes;

class OrderBy implements IQueryScope
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    function apply(\App\Common\Repository $repositoryContract)
    {
        $request = collect($this->data);

        $key = $request->get('orderBy','id');
        $value =  $request->get('order','des');

        $repositoryContract->orderBy($key,$value);
    }
}
