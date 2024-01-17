<?php
namespace App\Services;
use App\Models\User;
use App\Models\Order;
Class SpecialistOrderService {

    public function invited($spId)
    {
        $orders = Order::where('status', config('constants.new_order'))->where('user_id', 0)
            ->whereHas('invitations', function ($q) use ($spId) {
               $q->specialist_id = $spId;
            })->get();
        return $orders;
    }
    public function list($spId, $status)
    {
        return Order::class::where('user_id', $spId)->where('status', $status)->get();
    }
}
