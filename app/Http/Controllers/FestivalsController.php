<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Festivals;

class FestivalsController extends Controller
{
    public function getFestivals() {
        return Festivals::all();
    }
    public function addFestivals(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|integer',
            'artist_id' => 'required|exists:artists,id',
            'city_id' => 'required|exists:cities,id'
        ]);

        return Festivals::create($request->all());
    }
    public function updateFestivals(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|integer',
            'artist_id' => 'required|exists:artists,id',
            'city_id' => 'required|exists:cities,id'
        ]);

        return Festivals::find($id)->update($request->all());
    }
    public function deleteFestivals($id) {
        return Festivals::find($id)->delete();
    }
}
