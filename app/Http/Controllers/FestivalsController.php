<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festivals;
use App\Http\Models\Artists;
use App\Http\Models\MusicType;
use App\Http\Requests\FestivalsRequest;
use App\Http\Controllers\ResponseController;


class FestivalsController extends ResponseController
{
    public function getFestivals() {
        return $this->sendResponse(Festivals::all(),"Sikeres lekérés");
    }
    public function addFestivals(FestivalsRequest $request)
    {
       $festivals = new Festivals;
       $festivals->name = $request["name"];
       $festivals->date = $request["date"];
       $festivals->city_id = (new CityController)->getCityId($request["name"]);
       $festivals->artists_id = (new ArtistController)->getArtistId($request["name"]);
       $festivals->price = $request["price"];
       $festivals->save();
       return $this->sendResponse($festivals,"Sikeres felvétel");

       
    }
    public function editFestivals(FestivalsRequest $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'city_id' => 'required|integer',
            'artists_id' => 'required|integer',
            'price' => 'required|integer'
        ]);
        Festivals::find($id)->update($request->all());
        return $this->sendResponse(Festivals::find($id),"Sikeres frissítés");

       
    }
    public function deleteFestivals($id) {
      Festivals::find($id)->delete();
      return $this->sendResponse(Festivals::all(),"Sikeres törlés");
    }
}
