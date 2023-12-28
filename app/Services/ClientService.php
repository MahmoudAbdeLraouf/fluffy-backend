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
        $client = new Clientt();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = $request->password;
        $client->phone = $request->phone;
        $client->save();
        // check if request of region ids is more then 1
        if(count($request->region_ids) > 0){
            $client->regions()->attach($request->region_ids);
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
        $client->email = $request->email;
        if ($request->password != null){
            $client->password = $request->password;
        }
        $client->phone = $request->phone;
        $client->save();
        $client->regions()->sync($request->region_ids);
    }

    // delete Client function
    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();
    }
}
