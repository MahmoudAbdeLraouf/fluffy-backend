<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CityService;

class CityController extends Controller
{
    // city Services
    private $cityService;
    // constructor
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // call city Services
        $cities = $this->cityService->list();
        // return index view
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return create view
        return view('admin.cities.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'ادخل اسم المدينة',
            ]
        );
        // call city Services create function
        $this->cityService->create($request);
        // redirect to index page
        return redirect()->route('cities.index')->with('success', 'تم اضافة المدينة بنجاح.');
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
        // call city Services find function
        $city = $this->cityService->find($id);
        // return edit view
        return view('admin.cities.store', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate request
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'ادخل اسم المدينة',
            ]
        );
        // call city Services update function
        $this->cityService->update($request, $id);
        // redirect to index page
        return redirect()->route('cities.index')->with('success', 'تم تعديل المدينة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  call city Services delete function
        $this->cityService->delete($id);
        // redirect to index page
        return redirect()->route('cities.index')->with('success', 'تم حذف المدينة بنجاح.');
    }
}
