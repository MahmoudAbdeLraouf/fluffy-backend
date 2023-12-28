<?php
namespace App\Services;
use App\Models\Region;
Class RegionService {

    // list all regions function
    public function list($city_id)
    {
        $regions = Region::where('city_id', $city_id)->get();
        return $regions;
    }

    // create region function
    public function create($request)
    {
        $region = new Region();
        $region->name = $request->name;
        $region->city_id = $request->city_id;
        $region->delivery_fees = $request->delivery_fees;
        $region->save();
    }

    // find region function
    public function find($cityId)
    {
        $region = Region::where('city_id', $cityId)->get();
        return $region;
    }

    // update region function
    public function update($request, $id)
    {
        $region = Region::find($id);
        $region->name = $request->name;
        $region->city_id = $request->city_id;
        $region->delivery_fees = $request->delivery_fees;
        $region->save();
    }

    // delete region function
    public function delete($id)
    {
        $region = Region::find($id);
        $region->delete();
    }
}
