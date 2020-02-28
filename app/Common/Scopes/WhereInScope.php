<?php


namespace App\Common\Scopes;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;

class WhereInScope implements IQueryScope
{


    /**
     * @var Request
     */
    private $values;
    private $column;

    /**
     * FilterScope constructor.
     * @param Collection $collection
     */
    public function __construct($column,$values)
    {
        $this->column=$column;
        $this->values=$values;
    }

    function apply(\App\Common\Repository $repositoryContract)
    {
        if(isset($this->column) && isset($this->values)){
            $repositoryContract->whereIn($this->column,$this->values);
        }
    }
}
