<?php


namespace App\Domain\Sales\Events;


use App\Common\IDomainEvent;

class OrderCreated implements IDomainEvent
{
    public $orderId;

    /**
     * OrderCreated constructor.
     * @param $orderId
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }
}
