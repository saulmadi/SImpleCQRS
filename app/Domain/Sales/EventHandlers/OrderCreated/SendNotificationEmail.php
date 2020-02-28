<?php


namespace App\Domain\Sales\EventHandlers\OrderCreated;



use App\Domain\Sales\Events\OrderCreated;
use App\Domain\Sales\Repositories\OrderRepository;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;

class SendNotificationEmail
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * SendNotificationEmail constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handle(OrderCreated $created) {

        $order = $this->orderRepository->getById($created->orderId);

        

        Notification::route('mail', $order->clientEmail)
            ->notify(new OrderCreatedNotification($order));

    }

}
