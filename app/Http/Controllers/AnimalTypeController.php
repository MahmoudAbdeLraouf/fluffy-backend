<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AnimalTypeService;
class AnimalTypeController extends Controller
{
    // animal type Services
    private $animalTypeService;
    // constructor
    public function __construct(AnimalTypeService $animalTypeService)
    {
        $this->animalTypeService = $animalTypeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // call animal type Services
        $animal_types = $this->animalTypeService->list();

        return view('admin.animals-types.index', compact('animal_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return create view
        return view('admin.animals-types.store');
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
            'name.required' => 'ادخل نوع الحيوان',
            ]
        );

        // call animal type Services create function
        $this->animalTypeService->create($request);
        // redirect to index page
        return redirect()->route('animal-types.index')->with('success', 'تم اضافة نوع الحيوان بنجاح.');
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
        // call animal type Services find function
        $animal_type = $this->animalTypeService->find($id);
        // return edit view
        return view('admin.animals-types.store', compact('animal_type'));
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
            'name.required' => 'ادخل نوع الحيوان',
            ]
        );
        // call animal type Services update function
        $this->animalTypeService->update($request, $id);
        // redirect to index page
        return redirect()->route('animal-types.index')->with('success', 'تم تعديل نوع الحيوان بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // call animal type Services destroy function
        $this->animalTypeService->delete($id);
        // redirect to index page
        return redirect()->route('animal-types.index')->with('success', 'تم حذف نوع الحيوان بنجاح.');
    }
}
