<?php


namespace App\Domain\Sales\CommandHandlers;


use App\Domain\Sales\Commands\UpdateOrder;
use App\Domain\Sales\Repositories\OrderRepository;
use Psy\VersionUpdater\Checker;

class UpdateOrderHandler
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function handle(UpdateOrder $updateOrder){
        $order = $this->orderRepository->getById($updateOrder->orderId);

        $order->updateClientInformation($updateOrder);


        $this->orderRepository->save($order);

    }

}
