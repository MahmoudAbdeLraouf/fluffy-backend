<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegionService;
class RegionController extends Controller
{
    // region Services
    private $regionService;
    // city Services
    private $cityService;
    // constructor
    public function __construct(RegionService $regionService)
    {
        $this->regionService = $regionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(string $city_id)
    {
        // call region Services
        $regions = $this->regionService->list($city_id);
        // return index view
        return view('admin.regions.index', compact('regions', 'city_id'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($city_id)
    {
        // return create view
        return view('admin.regions.store', compact('city_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'delivery_fees' => 'required',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'city_id.required' => 'حقل المدينة مطلوب',
            'delivery_fees.required' => 'حقل رسوم التوصيل مطلوب',
            ]
        );
        // call region Services
        $this->regionService->create($request);
        // return index view
        return redirect()->route('regions.index', $request->city_id)->with('success', 'تم إضافة المنطقة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $city_id)
    {
        // call region Services
        $regions = $this->regionService->find($city_id);
        return response()->json($regions);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // call region Services
        $region = $this->regionService->find($id);
        // return edit view
        return view('admin.regions.store', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'delivery_fees' => 'required',
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'city_id.required' => 'حقل المدينة مطلوب',
                'delivery_fees.required' => 'حقل رسوم التوصيل مطلوب',
            ]
        );
        // call region Services
        $this->regionService->update($request, $id);
        // return index view
        return redirect()->route('regions.index', $request->city_id)->with('success', 'تم تعديل المنطقة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // call region Services to get city_id
        $region = $this->regionService->find($id);
        // get city_id
        $city_id = $region->city_id;
        // call region Services
        $this->regionService->delete($id);
        // return index view
        return redirect()->route('regions.index', $city_id)->with('success', 'تم حذف المنطقة بنجاح');
    }
}
