<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderInvitationService;
use App\Services\SpecialistService;
use App\Services\OrderService;
class OrderInvitationController extends Controller
{

    // order Invitation Services
    private $orderInvitationService;
    private $specialistService;
    private $orderService;
    // constructor
    public function __construct(OrderInvitationService $orderInvitationService, SpecialistService $specialistService, OrderService $orderService)
    {
        $this->orderInvitationService = $orderInvitationService;
        $this->specialistService = $specialistService;
        $this->orderService = $orderService;
    }
    public function invite(string $id)
    {
        $order = $this->orderService->find($id);
        $specialists = $this->specialistService->list();
        return view('admin.order_invitations.invite', compact('specialists','id', 'order'));
    }
    public function sendInvitation(Request $request)
    {
        $this->orderInvitationService->send($request);
        return redirect()->route('orders.index')->with('success', 'تم الدعوه بنجاح');
    }
}
