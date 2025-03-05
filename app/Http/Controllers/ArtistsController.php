<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artists;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\ArtistsRequest;


class ArtistsController extends ResponseController
{
    public function getArtists() {
        return $this->sendResponse(Artists::all(),"Sikeres lekérés");
    }
    public function addArtists(ArtistsRequest $request) {
        $artists = new Artists;
       $artists->name= $request["name"];
       $artists->music_type_id= $request["music_type_id"];
       $artists->save();
       return $this->sendResponse($artists,"Sikeres felvétel");
    }
    public function editArtists(ArtistsRequest $request,$id) {
        $request->validate([
            'name' => 'required|string',
            'music_type_id' => 'required|integer'
        ]);
        Artists::find($id)->update($request->all());
        return $this->sendResponse(Artists::find($id),"Sikeres frissítés");
    }
    public function deleteArtists($id) {
        Artists::find($id)->delete();
        return $this->sendResponse(Artists::all(),"Sikeres törlés");
    }   
}
