<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\ResponseController;


class CityController extends ResponseController
{
    public function getCities()
    {
        return $this->sendResponse(City::all(),"Sikeres lekérés");
    }

    public function addCity(CityRequest $request) {
       $city = new City;
       $city->name = $request["name"];
       $city->capacity = $request["capacity"];
       $city->save();
       return $this->sendResponse($city,"Sikeres felvétel");
        
    }
    public function updateCity(CityRequest $request, $id) {
        $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|integer'
        ]);
        City::find($id)->update($request->all());
        return $this->sendResponse(City::find($id),"Sikeres frissítés");
    }
    public function deleteCity($id) {
        City::find($id)->delete();
        return $this->sendResponse(City::all(),"Sikeres törlés");
    }
    public function getCityId( $cityName ) {

        $city = City::where( "name", $cityName )->first();

        $id = $city->id;

        return $id;
    }
}
