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
        return $this->sendResponse(City::all(), $city);
    }
    public function addCity(CityRequest $request) {
       $city = new City;
       $city->name = $request["city"];
       $city->capacity = $request["capacity"];
       $city->save();
       return $this->sendResponse($city,"Sikeres felvétel");
        
    }
    public function updateCity(CityRequest $request, $id) {
        $request->validate([
            'city' => 'required|string',
            'capacity' => 'required|integer'
        ]);
        return City::find($id)->update($request->all());
    }
    public function deleteCity($id) {
        return City::find($id)->delete();
    }
}
