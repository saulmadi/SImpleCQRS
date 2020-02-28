<?php


namespace App\Domain\Sales\CommandHandlers;


use App\Domain\Sales\Commands\CreateOrder;
use App\Domain\Sales\Repositories\OrderRepository;

class CreateOrderHandler
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository  $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function handle(CreateOrder $createOrder) {


        $this->orderRepository->create((array)  $createOrder);
    }
}
