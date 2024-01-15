<?php
namespace App\Services;
use App\Models\Specialist;
use App\Models\OrderInvitation;
use App\Mail\InvitEmail;
use Mail;

Class OrderInvitationService {

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
            $sp = Specialist::find($spId);
            Mail::to($sp->email)->send(new InvitEmail($content));
            return "Email has been sent.";
        }
    }
}
