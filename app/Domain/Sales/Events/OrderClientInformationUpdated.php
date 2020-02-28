<?php


namespace App\Domain\Sales\Events;


use App\Common\IDomainEvent;

class OrderClientInformationUpdated implements IDomainEvent
{
    public $orderId;

    /**
     * OrderClientInformationUpdated constructor.
     * @param mixed $getKey
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }
}
