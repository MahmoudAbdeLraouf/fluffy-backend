<?php
namespace App\Services;
use App\Models\Vaccination;
Class VaccinationService {

    // list all vaccination function
    public function list()
    {
        return Vaccination::all();
    }

    // create vaccination function
    public function create($request)
    {
        $vaccination = new Vaccination();
        $vaccination->name = $request->name;
        $vaccination->description = $request->description;
        $vaccination->animal_type_id = $request->animal_type_id;
        $vaccination->price = $request->price;
        $vaccination->save();
    }

    // find vaccination function
    public function find($id)
    {
        return Vaccination::find($id);
    }

    // update vaccination function
    public function update($request, $id)
    {
        $vaccination = Vaccination::find($id);
        $vaccination->name = $request->name;
        $vaccination->description = $request->description;
        $vaccination->animal_type_id = $request->animal_type_id;
        $vaccination->price = $request->price;
        $vaccination->save();
    }

    // delete vaccination function
    public function delete($id)
    {
        $vaccination = Vaccination::find($id);
        $vaccination->delete();
    }
}
