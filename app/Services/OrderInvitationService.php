<?php
namespace App\Services;
use App\Models\User;
use App\Models\OrderInvitation;
use App\Mail\InvitEmail;
use Carbon\Carbon;
use Mail;
use App\Models\Order;
Class OrderInvitationService {

    public function findSp($orderId)
    {
        $order = Order::find($orderId);
        $orderRegion = $order->region_id;
        $orderDate = $order->date;
        // get date day
        $day = $this->mapDays(Carbon::create($orderDate)->format('l'));
        // get date from
        $from = $order->from;
        // get date to
        $to = $order->to;
        // get specialists by region and day
        $specialists = User::whereHas('regions', function ($query) use ($orderRegion) {
            $query->where('region_id', $orderRegion);
        })->whereHas('availability', function ($query) use ($day, $from, $to) {
            $query->where('avaliabity_day', $day)->where('avaliabity_from', '<=', $from)->where('avaliabity_to', '>=', $to);
        })->get();
        return $specialists;
    }
    public function send($request)
    {
        OrderInvitation::where('order_id', $request->id)->delete();
        foreach ($request->specialists_ids as $spId){
            $inv = new OrderInvitation();
            $inv->order_id = $request->id;
            $inv->specialist_id = $spId;
            $inv->save();
            $content = [
                'subject' => 'This is the mail subject',
                'body' => 'New Order here ',
                'url' => env("SP_ORDER_URL").$request->id
            ];
            $sp = User::find($spId);
            Mail::to($sp->email)->send(new InvitEmail($content));
            return "Email has been sent.";
        }
    }

    public function mapDays($day)
    {
        // map days
        $days = [
            'Saturday' => 'السبت',
            'Sunday' => 'الاحد',
            'Monday' => 'الاثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الاربعاء',
            'Thursday' => 'الخميس',
            'Friday' => 'الجمعه',
        ];
        return $days[$day];
    }
}
