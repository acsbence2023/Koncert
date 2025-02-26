<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    public function getArtists() {
        return view('artists');
    }
    public function addArtists() {
        return view('addartists');
    }
    public function editArtists() {
        return view('editartists');
    }
    public function deleteArtists() {
        return view('deleteartists');
    }   
}
