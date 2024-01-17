<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpecialistOrderService;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
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
        // get authenticated user
         $user = Auth::user();
        $orders = $this->specialistOrderService->invited($user->id);
        return view('specialist.orders.index', compact('orders'));
    }
    public function listCurrentOrders()
    {
        $user = Auth::user();
        $orders = $this->specialistOrderService->list($user->id, config('constants.accepted_order'));
        return view('specialist.orders.current', compact('orders'));
    }
    public function listCompletedOrders()
    {
        $user = Auth::user();
        $orders = $this->specialistOrderService->list($user->id, config('constants.completed_order'));
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
