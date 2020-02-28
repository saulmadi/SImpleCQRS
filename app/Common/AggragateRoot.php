<?php


namespace App\Common;


/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 26-Oct-18
 * Time: 12:41 AM
 */



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;



abstract class AggregateRoot extends Model
{
    use SoftDeletes;

    protected $raisedEvents;


    public function __construct(array $attributes = [])
    {
        $this->raisedEvents = collect([]);
        parent::__construct($attributes);

    }

    /**
     * @return Collection
     */
    public function getRaisedEvents(): Collection
    {
        return $this->raisedEvents;
    }

    /**
     * @param IDomainEvent $event
     */
    protected function apply(IDomainEvent $event)
    {
        $this->raisedEvents->push($event);
    }


    /**
     * @return AggregateRoot
     */
    public function crear(array $attributes = [])
    {
        return $this->create($attributes);
    }


}
