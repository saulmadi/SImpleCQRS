<?php
/**
 * Created by PhpStorm.
 * User: Enner
 * Date: 2/12/2019
 * Time: 2:00 PM
 */

namespace App\Common\Scopes;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrWhereHas implements IQueryScope
{
    /**
     * @var Request
     */
    private $value;

    /**
     * FilterScope constructor.
     * @param Collection $collection
     */

    private $column;
    private $relacion;
    private $operator;

    public function __construct($relacion, $column,$operator,$value)
    {
        $this->relacion = $relacion;
        $this->column = $column;
        $this->operator = $operator;
        $this->value =$value;
    }

    function apply(\App\Common\Repository $repositoryContract)
    {
        if (isset($this->value)) {
            $value = $this->value;
            $column= $this->column;
            $operator= $this->operator;

            $repositoryContract->orWhereHas($this->relacion,function ($q) use ($column,$value,$operator) {
                $q->where($column, $operator,$value);
            });

        }
    }
}
