<?php


namespace App\Domain\Sales\Repositories;


use App\Common\Repository;
use App\Domain\Sales\Entities\Order;

class OrderRepository extends  Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Order::class;
    }
}
