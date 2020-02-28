<?php


namespace App\Common\Scopes;


use App\Common\Repository;

class AndLikeMultiple implements IQueryScope
{
    private $searchValue;
    /**
     * @var array
     */
    private $columns;

    public function __construct($searchValue, array $columns)
    {
        $this->columns=$columns;
        $this->searchValue = $searchValue;
    }

    function apply(Repository $repositoryContract)
    {
        if(!is_null($this->searchValue)) {
            $repositoryContract
                ->whereNested(function ($q) {
                    foreach ($this->columns as $column){
                        $q->orwhere($column,'LIKE','%'.$this->searchValue.'%');
                    }

            });

        }
    }
}
