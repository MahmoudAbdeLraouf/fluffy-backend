<?php
namespace App\Services;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemVaccination;
use App\Models\OrderInvitation;

Class OrderService {

    // list all Orders function
    public function list()
    {
        return Order::all();
    }

    // create Client function
    public function create($request)
    {
        $order = new Order();
        $order->client_id = $request->client_id;
        $order->region_id = $request->region_id;
        $order->address = $request->address;
        $order->date = $request->date;
        $order->from = $request->from;
        $order->to = $request->to;
        $order->note = $request->notes;
        $order->status = config('constants.new_order');
        $order->save();
        if ($request->has('animal_type_id')) {
            // set order item
            $item = new OrderItem();
            $item->order_id = $order->id;
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
    }

    // find Order function
    public function find($id)
    {
        return Order::find($id);
    }

    // update Order function
    public function update($request, $id)
    {
        $order = Order::find($id);
        $order->client_id = $request->client_id;
        $order->region_id = $request->region_id;
        $order->address = $request->address;
        $order->date = $request->date;
        $order->from = $request->from;
        $order->to = $request->to;
        $order->note = $request->notes;
        $order->save();
    }

    // delete Order function
    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
    }

    public function changeStatus($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
    }


}
