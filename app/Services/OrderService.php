<?php
namespace App\Services;
use App\Models\Client;
Class ClientService {

    // list all Clients function
    public function list()
    {
        return Client::all();
    }

    // create Client function
    public function create($request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->gender = $request->gender;
        $client->phone = $request->phone;
        $client->region_id = $request->region_id;
        $client->know_from = $request->know_from;
        $client->subscription_date = $request->subscription_date;
        $client->save();

        // check if request of region ids is more then 1
        if(count($request->animal_types_ids) > 0){
            $client->animal_types()->attach($request->animal_types_ids);
        }
    }

    // find Client function
    public function find($id)
    {
        return Client::find($id);
    }

    // update Client function
    public function update($request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->name;
        $client->gender = $request->gender;
        $client->phone = $request->phone;
        $client->region_id = $request->region_id;
        $client->know_from = $request->know_from;
        $client->subscription_date = $request->subscription_date;
        $client->save();

        $client->animal_types()->sync($request->animal_types_ids);
    }

    // delete Client function
    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();
    }
}
