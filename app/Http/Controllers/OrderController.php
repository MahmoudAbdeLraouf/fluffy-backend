<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Services\ClientService;
use App\Services\RegionService;
use App\Services\CityService;
use App\Services\AnimalTypeService;
use App\Services\VaccinationService;
use App\Services\SpecialistService;
class OrderController extends Controller
{
    // order Services
    private $orderService;
    private $clientService;
    private $regionService;
    private $cityService;
    private $animalTypeService;
    private $vaccinationService;
    private $specialistService;
    // constructor
    public function __construct(OrderService $orderService, ClientService $clientService, RegionService $regionService, CityService $cityService, AnimalTypeService $animalTypeService, VaccinationService $vaccinationService, SpecialistService $specialistService)
    {
        $this->orderService = $orderService;
        $this->clientService = $clientService;
        $this->regionService = $regionService;
        $this->cityService = $cityService;
        $this->animalTypeService = $animalTypeService;
        $this->vaccinationService = $vaccinationService;
        $this->specialistService = $specialistService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // call order Services
        $orders = $this->orderService->list();
        // return index view
        return view('admin.orders.index', compact('orders'));
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
        return view('admin.orders.store', compact('clients', 'cities', 'regions', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'client_id' => 'required',
            'city_id' => 'required',
            'region_id'=>'required',
            'address'=>'required',
            'date'=>'required',
            'from'=>'required',
            'to'=>'required',
        ],[
                'client_id.required' => 'حقل العميل مطلوب',
                'city_id.required' => 'حقل المدينه مطلوب',
                'region_id.required' => 'حقل المنطقه مطلوب',
                'address'=>'حقل العنوان مطلوب',
                'date'=>'حقل تاريخ مطلوب',
                'from'=>'حقل من مطلوب',
                'to'=>'حقل الي مطلوب',
            ]
        );
        $this->orderService->update($request, $id);
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
