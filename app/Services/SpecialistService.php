<?php
namespace App\Services;
use App\Models\Specialist;
Class SpecialistService {

    // list all Specialists function
    public function list()
    {
        return Specialist::all();
    }

    // create Specialist function
    public function create($request)
    {
        $specialist = new Specialist();
        $specialist->name = $request->name;
        $specialist->email = $request->email;
        $specialist->password = $request->password;
        $specialist->phone = $request->phone;
        $specialist->save();
        // check if request of region ids is more then 1
        if(count($request->region_ids) > 0){
            $specialist->regions()->attach($request->region_ids);
        }
    }

    // find Specialist function
    public function find($id)
    {
        return Specialist::find($id);
    }

    // update vaccination function
    public function update($request, $id)
    {
        $specialist = Specialist::find($id);
        $specialist->name = $request->name;
        $specialist->email = $request->email;
        if ($request->password != null){
            $specialist->password = $request->password;
        }
        $specialist->phone = $request->phone;
        $specialist->save();
        $specialist->regions()->sync($request->region_ids);
    }

    // delete Specialist function
    public function delete($id)
    {
        $specialist = Specialist::find($id);
        $specialist->delete();
    }
}
