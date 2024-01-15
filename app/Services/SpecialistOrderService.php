<?php
namespace App\Services;
use App\Models\Specialist;
use App\Models\Order;
Class SpecialistOrderService {

    // list order

    public function invited($spId)
    {
//        dd(config('constants.new_order'));
        $orders = Order::where('status', config('constants.new_order'))->where('specialist_id', 0)
            ->whereHas('invitations', function ($q) use ($spId) {
               $q->specialist_id = $spId;
            })->get();
        return $orders;
    }
    public function list($spId, $status)
    {
        return Order::class::where('specialist_id', $spId)->where('status', $status)->get();
    }
}
