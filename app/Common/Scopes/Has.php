<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 24/2/2019
 * Time: 10:27 PM
 */

namespace App\Common\Scopes;




class Has implements IQueryScope
{
    private $relacion;
    private $operador;
    private $cantidad;

    public function __construct($relacion, $operador = '>', $cantidad = 0)
    {
        $this->relacion = $relacion;
        $this->operador = $operador;
        $this->cantidad = $cantidad;
    }

    function apply(\App\Common\Repository $repositoryContract)
    {
        if(isset($this->relacion)){
            $relacion =  $this->relacion;
            $operador = $this->operador;
            $cantidad = $this->cantidad;

            $repositoryContract->Has($relacion,$operador,$cantidad);
        }
    }
}
