<?php
namespace App\Services;
use App\Models\AnimalType;

Class AnimalTypeService {

    // list all animals types function
    public function list()
    {
        $animal_types = AnimalType::all();
        return $animal_types;
    }

    // create animal type function
    public function create($request)
    {
        $animal_type = new AnimalType();
        $animal_type->name = $request->name;
        $animal_type->save();
    }

    // find animal type function
    public function find($id)
    {
        $animal_type = AnimalType::find($id);
        return $animal_type;
    }

    // update animal type function
    public function update($request, $id)
    {
        $animal_type = AnimalType::find($id);
        $animal_type->name = $request->name;
        $animal_type->save();
    }

    // delete animal type function
    public function delete($id)
    {
        $animal_type = AnimalType::find($id);
        $animal_type->delete();
    }
}
