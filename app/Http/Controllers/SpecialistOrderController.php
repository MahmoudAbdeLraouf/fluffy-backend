<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpecialistOrderService;
use App\Services\OrderService;

class SpecialistOrderController extends Controller
{
    //
    private $specialistOrderService;
    private $orderService;
    public function __construct(SpecialistOrderService $specialistOrderService, OrderService $orderService)
    {
        $this->specialistOrderService = $specialistOrderService;
        $this->orderService = $orderService;
    }

    public function listNewOrders()
    {
        $orders = $this->specialistOrderService->invited(1);
        return view('specialist.orders.index', compact('orders'));
    }
    public function listCurrentOrders()
    {
        $orders = $this->specialistOrderService->list(1, config('constants.accepted_order'));
        return view('specialist.orders.current', compact('orders'));
    }
    public function listCompletedOrders()
    {
        $orders = $this->specialistOrderService->list(1, config('constants.completed_order'));
        return view('specialist.orders.completed', compact('orders'));
    }

    public function details($id)
    {
        $order = $this->orderService->find($id);
        $orderItems = $order->items;
        return view('specialist.orders.details', compact('orderItems', 'order'));
    }

    public function changeStatus($id, $status)
    {
        $this->orderService->changeStatus($id, $status);
        return redirect()->route('specialists.orders.current')->with('success', 'تم تغير حاله الطلب بنجاح');
    }
}
