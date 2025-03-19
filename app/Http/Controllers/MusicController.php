<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicType;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\MusicTypeRequest;


class MusicController extends ResponseController
{
    public function getMusic() {
        return $this->sendResponse(MusicType::all(),"Sikeres lekérés");
    }
    public function addMusic(MusicTypeRequest $request) {
        // Gate::before( function(){

        //     $user = auth( "sanctum" )->user();
        //     if( $user->admin == 2 ){

        //         return true;
        //     }
        // });
        // if ( !Gate::allows( "admin" )) {

        //     return $this->sendError( "Autentikációs hiba", "Nincs jogosultság", 401 );
        // }
        $music = new MusicType;
        $music->category = $request["category"];
        $music->save();
        return $this->sendResponse($music,"Sikeres felvétel");
    }
    public function editMusic(MusicTypeRequest $request,$id) {
        // Gate::before( function(){

        //     $user = auth( "sanctum" )->user();
        //     if( $user->admin == 2 ){

        //         return true;
        //     }
        // });
        // if ( !Gate::allows( "admin" )) {

        //     return $this->sendError( "Autentikációs hiba", "Nincs jogosultság", 401 );
        // }
        $request->validate([
            'category' => 'required|string'
        ]);
        MusicType::find($id)->update($request->all());
        return $this->sendResponse(MusicType::find($id),"Sikeres frissítés");
    }
    public function deleteMusic($id) {
        // Gate::before( function(){

        //     $user = auth( "sanctum" )->user();
        //     if( $user->admin == 2 ){

        //         return true;
        //     }
        // });
        // if ( !Gate::allows( "admin" )) {

        //     return $this->sendError( "Autentikációs hiba", "Nincs jogosultság", 401 );
        // }
        MusicType::find($id)->delete();
        return $this->sendResponse(MusicType::all(),"Sikeres törlés");
    }
    public function getMusicId( $musicCategory ) {

        $music = City::where( "category", $cityCategory )->first();

        $id = $music->id;

        return $id;
    }
}
