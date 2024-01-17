<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpecialistService;
use App\Services\CityService;
use App\Services\RegionService;;
class SpecialistController extends Controller
{
    private $specialistService;
    private $cityService;
    private $regionService;
    // create specialist service
    public function __construct(SpecialistService $specialistService, CityService $cityService, RegionService $regionService)
    {
        $this->specialistService = $specialistService;
        $this->cityService = $cityService;
        $this->regionService = $regionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialists = $this->specialistService->list();
        return view('admin.specialists.index', compact('specialists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = $this->cityService->list();
        $regions = $cities->count() ? $this->regionService->list($cities->first()->id): collect();
        $avaliabity = config('constants.avaliabity');
        return view('admin.specialists.store', compact('cities','regions', 'avaliabity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password'=>'required',
            'region_ids'=>'required|array'
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'email.required' => 'حقل البريد الاليكتروني مطلوب',
                'phone.required' => 'حقل رقم الجوال مطلوب',
                'password.required' => 'حقل الرمز السري مطلوب',
                'region_id'=>'حقل المنطقه مطلوب'

            ]
        );
        $this->specialistService->create($request);
        return redirect()->route('specialists.index');
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
        $specialist = $this->specialistService->find($id);
        $cities = $this->cityService->list();
        $regions = $specialist->regions->count() ? $this->regionService->list($specialist->regions->first()->city_id) : collect();
        $avaliabity = config('constants.avaliabity');
        return view('admin.specialists.store', compact('specialist', 'cities','regions', 'avaliabity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'region_ids'=>'required'
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'email.required' => 'حقل البريد الاليكتروني مطلوب',
                'phone.required' => 'حقل رقم الجوال مطلوب',
                'password.required' => 'حقل الرمز السري مطلوب',
                'region_ids'=>'حقل المنطقه مطلوب'

            ]
        );
        $this->specialistService->update($request, $id);
        return redirect()->route('specialists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->specialistService->delete($id);
        return redirect()->route('specialists.index');
    }

}
