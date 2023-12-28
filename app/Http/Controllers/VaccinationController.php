<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VaccinationService;
use App\Services\AnimalTypeService;
class VaccinationController extends Controller
{
    private $vaccinationService;
    private $animalTypeService;
    // create vaccination service
    public function __construct(VaccinationService $vaccinationService, AnimalTypeService $animalTypeService)
    {
        $this->vaccinationService = $vaccinationService;
        $this->animalTypeService = $animalTypeService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vaccinations = $this->vaccinationService->list();
        return view('admin.vaccinations.index', compact('vaccinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animalTypes = $this->animalTypeService->list();
        return view('admin.vaccinations.store', compact('animalTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'animal_type_id' => 'required',
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'price.required' => 'حقل السعر مطلوب',
                'description.required' => 'حقل الوصف مطلوب',
                'animal_type_id.required' => 'حقل نوع الحيوان مطلوب',
            ]
        );
        $this->vaccinationService->create($request);
        return redirect()->route('vaccinations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animalTypes = $this->animalTypeService->list();
        $vaccination = $this->vaccinationService->find($id);
        return view('admin.vaccinations.store', compact('vaccination', 'animalTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'animal_type_id' => 'required',
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'price.required' => 'حقل السعر مطلوب',
                'description.required' => 'حقل الوصف مطلوب',
                'animal_type_id.required' => 'حقل نوع الحيوان مطلوب',
            ]
        );
        $this->vaccinationService->update($request, $id);
        return redirect()->route('vaccinations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->vaccinationService->delete($id);
        return redirect()->route('vaccinations.index');
    }
}
