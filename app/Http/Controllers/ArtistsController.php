<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artists;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\ArtistsRequest;
use App\Http\Controllers\MusicController;


class ArtistsController extends ResponseController
{
    public function getArtists() {
        return $this->sendResponse(Artists::all(),"Sikeres lekérés");
    }
    public function addArtists(ArtistsRequest $request) {
        $request->validated();

        $artists = new Artists;
        $artists->name = $request["name"];
        $artists->music_type_id = (new MusicController)->getMusicId($request["category"]);
        
        $artists->save();
    
        return $this->sendResponse($artists, "Sikeres felvétel");
    }
    public function editArtists(ArtistsRequest $request,$id) {
        $request->validate();
        $artists->name= $request["name"];
        $artists->music_type_id= (new MusicController)->getMusicId($request["category"]);
        $artists->update();
        return $this->sendResponse(Artists::find($id),"Sikeres frissítés");
    }
    public function deleteArtists($id) {
        Artists::find($id)->delete();
        return $this->sendResponse(Artists::all(),"Sikeres törlés");
    }   
    public function getArtistsId( $artistName ) {

        $artists = Artists::where( "name", $artistName )->first();

        $id = $artists->id;

        return $id;
    }
}
