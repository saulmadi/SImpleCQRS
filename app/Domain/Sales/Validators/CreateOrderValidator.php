<?php


namespace App\Domain\Sales\Validators;




use App\Common\CommandValidator;

class CreateOrderValidator extends CommandValidator
{

    function rules($command): array
    {
        return  [
            'clientName' => 'required',
            'clientAddress' => 'required',
            'clientEmail' => 'required|email'
        ];
    }
}
