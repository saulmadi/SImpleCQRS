<?php


namespace App\Domain\Sales\EventHandlers\OrderClientInformationUpdated;



use App\Domain\Sales\Events\OrderClientInformationUpdated;
use App\Domain\Sales\Repositories\OrderRepository;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;

class SendNotificationOfOrderUpdated
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * SendNotificationOfOrderUpdated constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handle(OrderClientInformationUpdated $informationUpdated) {

        $order = $this->orderRepository->getById($informationUpdated->orderId);



        Notification::route('mail', $order->clientEmail)
            ->notify(new OrderCreatedNotification($order));
    }
}
