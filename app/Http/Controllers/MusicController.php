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
        $music = new MusicType;
        $music->category = $request["category"];
        $music->save();
        return $this->sendResponse($music,"Sikeres felvétel");
    }
    public function editMusic(MusicTypeRequest $request,$id) {
        $request->validate([
            'category' => 'required|string'
        ]);
        MusicType::find($id)->update($request->all());
        return $this->sendResponse(MusicType::find($id),"Sikeres frissítés");
    }
    public function deleteMusic($id) {
        MusicType::find($id)->delete();
        return $this->sendResponse(MusicType::all(),"Sikeres törlés");
    }
}
