<?php
/**
 * Created by PhpStorm.
 * User: Enner
 * Date: 1/26/2019
 * Time: 11:39 PM
 */

namespace App\Common\Scopes;
use App\Common\Repository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class BetweenDateScope implements IQueryScope
{
    /**
     * @var Request
     */
    private $collection;

    /**
     * FilterScope constructor.
     * @param Collection $collection
     */

    private $columna;

    public function __construct($columna,$collection)
    {
        $this->columna = $columna;

        $this->collection =is_null($collection)?[]:collect($collection);
    }

    function apply(\App\Common\Repository $repositoryContract)
    {
        if(!empty($this->collection) && $this->collection->count() === 2){
            $repositoryContract->where($this->columna,Carbon::make($this->collection[0].' 00:00:00'),'>=')
                ->where($this->columna,Carbon::make($this->collection[1].' 23:59:59'),'<=');
        }



    }
}
