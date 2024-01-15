<?php
namespace App\Services;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemVaccination;
use App\Models\OrderInvitation;
Class OrderItemService {

    // list all Orders function
    public function list($orderId)
    {
        return OrderItem::where('order_id', $orderId)->get();
    }

    public function create($request)
    {
        // set order item
        $item = new OrderItem();
        $item->order_id = $request->order_id;
        $item->animal_type_id = $request->animal_type_id;
        $item->animal_type_age = $request->animal_type_age;
        $item->save();
        // loop through vaccination_ids
        foreach ($request->vaccination_ids as $vaccination_id)
        {
            $vac = new OrderItemVaccination();
            $vac->order_item_id = $item->id;
            $vac->vaccination_id = $vaccination_id;
            $vac->save();
        }
    }

    public function update($request)
    {
        // set order item
        $item = new OrderItem();
        $item->order_id = $request->order_id;
        $item->animal_type_id = $request->animal_type_id;
        $item->animal_type_age = $request->animal_type_age;
        $item->save();
        $item->itemVaccination()->delete();
        // loop through vaccination_ids
        foreach ($request->vaccination_ids as $vaccination_id)
        {
            $vac = new OrderItemVaccination();
            $vac->order_item_id = $item->id;
            $vac->vaccination_id = $vaccination_id;
            $vac->save();
        }
    }

    public function delete($id)
    {
        $item = OrderItem::find($id);
        $orderId = $item->order_id;
        $item->delete();
        return $orderId;
    }

    public function find($id)
    {
        return OrderItem::find($id);
    }
}
