<?php

namespace App\Http\Controllers;

use App\Common\ICommandBus;
use App\Common\Scopes\FilterScope;
use App\Domain\Sales\Commands\CreateOrder;
use App\Domain\Sales\Commands\UpdateOrder;
use App\Domain\Sales\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var ICommandBus
     */
    private $commandBus;

    public function __construct(OrderRepository $orderRepository, ICommandBus $commandBus)
    {
        $this->orderRepository = $orderRepository;
        $this->commandBus = $commandBus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        //

        return $this->orderRepository
            ->with($request->with)
            ->applyScope(new FilterScope($request->all()))
            ->paginate($request->per_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $command = new CreateOrder($request->clientName, $request->clientAddress, $request->clientPhone, $request->clientEmail);
        return $this->commandBus->execute($command);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        return $this->commandBus->execute(new UpdateOrder($id, $request->clientName, $request->clientAddress, $request->clientPhone, $request->clientEmail));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
