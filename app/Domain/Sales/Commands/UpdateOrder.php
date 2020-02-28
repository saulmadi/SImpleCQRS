<?php


namespace App\Domain\Sales\Commands;


use App\Common\ICommand;

class UpdateOrder implements ICommand
{

    public $clientName;
    public $clientAddress;
    public $clientPhone;
    public $clientEmail;
    public $orderId;

    public function __construct($orderId,$clientName, $clientAddress, $clientPhone, $clientEmail)
    {
        $this->clientName = $clientName;
        $this->clientAddress = $clientAddress;
        $this->clientPhone = $clientPhone;
        $this->clientEmail = $clientEmail;
        $this->orderId = $orderId;
    }

}
