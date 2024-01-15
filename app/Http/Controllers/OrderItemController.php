<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderItemService;
class OrderItemController extends Controller
{

    // order vaccination Services
    private $orderItemsService;
    // constructor
    public function __construct(OrderItemService $orderItemsService)
    {
        $this->orderItemsService = $orderItemsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($orderId)
    {
        // call order Services
        $orderItems = $this->orderItemsService->list($orderId);
        // return index view
        return view('admin.order_vaccinations.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = $this->clientService->list();
        $cities = $this->cityService->list();
        $regions = $cities->count() ? $this->regionService->list($cities->first()->id): collect();
        $animalTypes = $this->animalTypeService->list();
        $vaccinations = $this->vaccinationService->list();
        // return create view
        return view('admin.orders.store', compact('clients', 'cities', 'regions', 'animalTypes', 'vaccinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'client_id' => 'required',
            'city_id' => 'required',
            'region_id'=>'required',
            'address'=>'required',
            'date'=>'required',
            'from'=>'required',
            'to'=>'required',
            'animal_type_id'=>'required',
            'animal_type_age'=>'required',
            'vaccination_ids'=>'required|array'
        ],[
                'client_id.required' => 'حقل العميل مطلوب',
                'city_id.required' => 'حقل المدينه مطلوب',
                'region_id.required' => 'حقل المنطقه مطلوب',
                'address'=>'حقل العنوان مطلوب',
                'date'=>'حقل تاريخ مطلوب',
                'from'=>'حقل من مطلوب',
                'to'=>'حقل الي مطلوب',
                'animal_type_id'=>'حقل انواع الحيوانات مطلوب',
                'animal_type_age'=>'حقل عمر الحيوانات مطلوب',
                'vaccination_ids'=>'حقل التطعيم مطلوب',

            ]
        );
        $this->orderService->create($request);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order =  $this->orderService->find($id);
        $clients = $this->clientService->list();
        $cities = $this->cityService->list();
        $regions = $cities->count() ? $this->regionService->list($cities->first()->id): collect();
        return view('admin.orders.store', compact('clients', 'cities', 'regions', 'animalTypes', 'vaccinations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function invite(string $id)
    {
        $specialists = $this->specialistService->list();
        return view('admin.orders.invite', compact('specialists','id'));
    }
    public function sendInvitation(Request $request)
    {
        $this->orderService->sendInvitation($request);
        return redirect()->route('orders.index')->with('success', 'تم الدعوه بنجاح');
    }
}
