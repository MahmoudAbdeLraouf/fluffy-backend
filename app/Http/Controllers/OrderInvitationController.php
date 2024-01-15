<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderItemService;
use App\Services\AnimalTypeService;
use App\Services\VaccinationService;
use App\Models\OrderItems;
class OrderItemController extends Controller
{

    // order vaccination Services
    private $orderItemsService;
    private $animalTypeService;
    private $vaccinationService;
    // constructor
    public function __construct(OrderItemService $orderItemsService, AnimalTypeService $animalTypeService, VaccinationService $vaccinationService)
    {
        $this->orderItemsService = $orderItemsService;
        $this->animalTypeService = $animalTypeService;
        $this->vaccinationService = $vaccinationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($orderId)
    {
        // call order Services
        $orderItems = $this->orderItemsService->list($orderId);
        // return index view
        return view('admin.order_items.index', compact('orderItems', 'orderId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($orderId)
    {
        $animalTypes = $this->animalTypeService->list();
        $vaccinations = $this->vaccinationService->list();
        // return create view
        return view('admin.order_items.store', compact('animalTypes', 'vaccinations', 'orderId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {// validate request
        $request->validate([
            'order_id'=>'required',
            'animal_type_id'=>'required',
            'animal_type_age'=>'required',
            'vaccination_ids'=>'required|array'
        ],[
                'order_id.required' => 'حقل الطلب مطلوب',
                'animal_type_id'=>'حقل انواع الحيوانات مطلوب',
                'animal_type_age'=>'حقل عمر الحيوانات مطلوب',
                'vaccination_ids'=>'حقل التطعيم مطلوب',

            ]
        );
        $this->orderItemsService->create($request);
        return redirect()->route('orders.items.list', $request->order_id);
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
        $item =  $this->orderItemsService->find($id);
        $animalTypes = $this->animalTypeService->list();
        $vaccinations = $this->vaccinationService->list();
        $orderId = $item->order_id;
        return view('admin.order_items.store', compact('animalTypes', 'vaccinations', 'item', 'orderId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'animal_type_id'=>'required',
            'animal_type_age'=>'required',
            'vaccination_ids'=>'required|array'
        ],[
                'order_id.required' => 'حقل الطلب مطلوب',
                'animal_type_id'=>'حقل انواع الحيوانات مطلوب',
                'animal_type_age'=>'حقل عمر الحيوانات مطلوب',
                'vaccination_ids'=>'حقل التطعيم مطلوب',

            ]
        );
        $this->orderItemsService->update($request);
        return redirect()->route('orders.items.list', $request->order_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $orderId = $this->orderItemsService->delete($id);
        return redirect()->route('orders.items.list', $orderId);
    }
}
