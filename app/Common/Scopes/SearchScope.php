<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 30-Oct-18
 * Time: 7:09 PM
 */

namespace App\Common\Scopes;


use Illuminate\Support\Collection;

class SearchScope implements IQueryScope
{
    /**
     * @var
     */
    private $search;
    private $fields;

    public function __construct($search, array $fields)
    {

        $this->search = $search;
        $this->fields = collect($fields);
    }

    /**
     * @param \App\Common\Repository $repositoryContract
     */
    function apply(\App\Common\Repository $repositoryContract)
    {
        if(!is_null($this->search)) {
            foreach ($this->fields as $field){
             $field->build($this->search, $repositoryContract);
            }
        }
    }
}
