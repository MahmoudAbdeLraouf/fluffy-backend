<?php
namespace App\Services;
use App\Models\City;

Class CityService {

    // list all cities function
    public function list()
    {
        $cities = City::all();
        return $cities;
    }

    // create city function
    public function create($request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();
    }

    // find city function
    public function find($id)
    {
        $city = City::find($id);
        return $city;
    }

    // update city function
    public function update($request, $id)
    {
        $city = City::find($id);
        $city->name = $request->name;
        $city->save();
    }

    // delete city function
    public function delete($id)
    {
        $city = City::find($id);
        $city->delete();
    }
}
