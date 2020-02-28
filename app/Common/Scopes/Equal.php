<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 30-Oct-18
 * Time: 7:38 PM
 */

namespace App\Common\Scopes;




use App\Common\Repository;

class Equal implements  SearchField
{
    /**
     * @var
     */
    private $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    function build($search, \App\Common\Repository $repositoryContract)
    {
        if(is_numeric($search)){
            $repositoryContract->orWhere($this->field,$search);
        }
    }
}
