<?php
namespace App\Services;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemVaccination;
use App\Models\OrderInvitation;
Class OrderVaccinationService {

    // list all Orders function
    public function list($orderId)
    {
        return OrderItem::where('order_id', $orderId)->get();
    }


}
