<?php

namespace App\Domain\Sales\Entities;

use App\Common\AggregateRoot;
use App\Domain\Sales\Commands\UpdateOrder;
use App\Domain\Sales\Events\OrderClientInformationUpdated;
use Illuminate\Support\Str;

class Order extends AggregateRoot
{
    //

    public $incrementing = false;


    protected $fillable = ['id','clientName', 'clientPhone', 'clientAddress', 'clientEmail'];

    public function crear(array $attributes = [])
    {
        $attColl = collect($attributes);

        $id = $attColl->get('id', null);
        if (is_null($id)) {
            $attColl->put('id', Str::orderedUuid()->toString());
        }

        $archivo = parent::crear($attColl->toArray());

        $archivo->apply(new OrderCreated($archivo->getKey()));

        return $archivo;
    }

    protected $keyType = 'string';

    public function updateClientInformation(UpdateOrder $updateOrder){


        $this->attributes['clientName'] = $updateOrder->clientName;
        $this->attributes['clientAddress'] = $updateOrder->clientAddress;
        $this->attributes['clientPhone'] = $updateOrder->clientPhone;
        $this->attributes['clientEmail'] = $updateOrder->clientEmail;


        $this->apply(new OrderClientInformationUpdated($this->getKey()));
    }
}
