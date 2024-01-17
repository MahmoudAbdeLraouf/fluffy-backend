<?php
namespace App\Services;
use App\Models\User;

Class SpecialistService {

    // list all Specialists function
    public function list()
    {
        return User::where('is_admin', 0)->get();
    }

    // create Specialist function
    public function create($request)
    {
        $specialist = new User();
        $specialist->name = $request->name;
        $specialist->email = $request->email;
        $specialist->password = $request->password;
        $specialist->phone = $request->phone;
        $specialist->save();
        // check if request of region ids is more then 1
        if(count($request->region_ids) > 0){
            $specialist->regions()->attach($request->region_ids);
        }
        foreach ($request->avaliabity_day as $key => $day){
            $specialist->availability()->create([
                'avaliabity_day' => $day,
                'avaliabity_from' => $request->avaliabity_from[$key],
                'avaliabity_to' => $request->avaliabity_to[$key],
            ]);
        }
    }

    // find Specialist function
    public function find($id)
    {
        return User::find($id);
    }

    // update vaccination function
    public function update($request, $id)
    {
        $specialist = User::find($id);
        $specialist->name = $request->name;
        $specialist->email = $request->email;
        if ($request->password != null){
            $specialist->password = $request->password;
        }
        $specialist->phone = $request->phone;
        $specialist->save();
        $specialist->regions()->sync($request->region_ids);
        $specialist->availability()->delete();
        foreach ($request->avaliabity_day as $key => $day){
            $specialist->availability()->create([
                'avaliabity_day' => $day,
                'avaliabity_from' => $request->avaliabity_from[$key],
                'avaliabity_to' => $request->avaliabity_to[$key],
            ]);
        }
    }

    // delete Specialist function
    public function delete($id)
    {
        $specialist = User::find($id);
        $specialist->delete();
    }
}
