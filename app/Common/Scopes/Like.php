<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 30-Oct-18
 * Time: 7:43 PM
 */

namespace App\Common\Scopes;


class Like implements SearchField
{
    /**
     * @var
     */
    private $field;

    /**
     * Like constructor.
     * @param $field
     */
    public function __construct($field)
    {
        $this->field = $field;
    }

    function build($search, \App\Common\Repository $repositoryContract)
    {
        $repositoryContract->orWhere($this->field, '%'.$search .'%', 'like');
    }
}
