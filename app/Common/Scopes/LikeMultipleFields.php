<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 12-16-18
 * Time: 11:59 AM
 */

namespace App\Common\Scopes;


use Illuminate\Support\Facades\DB;

class LikeMultipleFields implements  SearchField
{
    /**
     * @var array
     */
    private $fields;


    /**
     * LikeMultipleFields constructor.
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }


    function build($search, \App\Common\Repository $repositoryContract)
    {
        $concat = 'CONCAT(' . implode(',', $this->fields) . ')';

        $repositoryContract->orWhere(DB::raw($concat), '%'.str_replace(' ','', $search). '%', 'like');

    }
}
