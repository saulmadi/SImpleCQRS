<?php


namespace App\Domain\Sales\Commands;


use App\Common\ICommand;

class CreateOrder implements ICommand
{

    public $clientName;
    public $clientAddress;
    public $clientPhone;
    public $clientEmail;

    public function __construct($clientName, $clientAddress, $clientPhone, $clientEmail)
    {
        $this->clientName = $clientName;
        $this->clientAddress = $clientAddress;
        $this->clientPhone = $clientPhone;
        $this->clientEmail = $clientEmail;
    }

}
