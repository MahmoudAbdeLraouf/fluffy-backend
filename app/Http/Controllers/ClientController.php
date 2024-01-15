<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\CityService;
use App\Services\RegionService;
use App\Services\AnimalTypeService;
class ClientController extends Controller
{
    private $clientService;
    private $cityService;
    private $regionService;
    private $animalTypeService;
    // create specialist service
    public function __construct(ClientService $clientService, CityService $cityService, RegionService $regionService, AnimalTypeService $animalTypeService)
    {
        $this->clientService = $clientService;
        $this->cityService = $cityService;
        $this->regionService = $regionService;
        $this->animalTypeService = $animalTypeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = $this->clientService->list();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = $this->cityService->list();
        $regions = $cities->count() ? $this->regionService->list($cities->first()->id): collect();
        $animalTypes = $this->animalTypeService->list();
        return view('admin.clients.store', compact('cities','regions','animalTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'region_id'=>'required',
            'know_from'=>'required',
            'subscription_date'=>'required',
            'animal_types_ids'=>'required|array'
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'gender.required' => 'حقل النوع مطلوب',
                'phone.required' => 'حقل رقم الجوال مطلوب',
                'region_id.required' => 'حقل المنطقه مطلوب',
                'know_from'=>'حقل كيف عرف عنا مطلوب',
                'subscription_date'=>'حقل تاريخ الاشتراك مطلوب',
                'animal_types_ids'=>'حقل انواع الحيوانات مطلوب'
            ]
        );
        $this->clientService->create($request);
        return redirect()->route('clients.index');
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
        $client = $this->clientService->find($id);
        $cities = $this->cityService->list();
        $regions = $client->region->count() ? $this->regionService->list($client->region->city_id) : collect();
        $animalTypes = $this->animalTypeService->list();
        return view('admin.clients.store', compact('client', 'cities','regions','animalTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate request
        // validate request
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'region_id'=>'required',
            'know_from'=>'required',
            'subscription_date'=>'required'
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'gender.required' => 'حقل النوع مطلوب',
                'phone.required' => 'حقل رقم الجوال مطلوب',
                'region_id.required' => 'حقل المنطقه مطلوب',
                'know_from'=>'حقل كيف عرف عنا مطلوب',
                'subscription_date'=>'حقل تاريخ الاشتراك مطلوب'
            ]
        );
        $this->clientService->update($request, $id);
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->clientService->delete($id);
        return redirect()->route('clients.index');
    }
    // get city by client id
    public function city(string $id)
    {
        $client = $this->clientService->find($id);
        $cityId = $client->region ? $client->region->city->id : '';
        return response()->json(['city_id' => $cityId, 'region_id' => $client->region_id]);
    }
}
