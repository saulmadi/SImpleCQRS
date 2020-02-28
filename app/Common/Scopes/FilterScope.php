<?php
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 30-Oct-18
 * Time: 11:14 AM
 */

namespace App\Common\Scopes;



use Illuminate\Support\Collection;

class FilterScope implements IQueryScope
{



    private $collection;

    /**
     * FilterScope constructor.
     * @param Collection $collection
     */
    public function __construct(array $collection)
    {

        $this->collection = collect($collection);
    }

    function apply(\App\Common\Repository $repositoryContract)
    {
        $fields = $this->collection->except(['search','page','per_page','orderBy','order','with','rangeDate','fieldRangeDate','has']);


        foreach ($fields as $key=>$value){

            $repositoryContract->where($key,$value);
        }
    }
}
