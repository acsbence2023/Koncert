<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\FestivalsController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Ide a pubban lévő minta kellene, tudod a védett api eléréses cuccok(super admin tudja csak kezelni az olyan lekéréseket).
//  Majd ezt az üzentet azért töröld ki.

Route::post('/addCity',[CityController::class,'addCity']);
Route::get('/getCities',[CityController::class,'getCities']);
Route::post('/updateCity/{id}',[CityController::class,'updateCity']);
Route::delete('/deleteCity/{id}',[CityController::class,'deleteCity']);

/* Route::post('/adduser', [UserController::class, 'addUser']); */
Route::post('/register', [UserController::class, 'register']);
Route::get('/users', [UserController::class, 'listUsers']);
Route::get('/users/{id}', [UserController::class, 'getUser']);

Route::post('/addArtists',[ArtistsController::class,'addArtists']);
Route::get('/getArtists',[ArtistsController::class,'getArtists']);
Route::post('/editArtists/{id}',[ArtistsController::class,'editArtists']);
Route::delete('/deleteArtists/{id}',[ArtistsController::class,'deleteArtists']);

Route::post('/addMusic',[MusicController::class,'addMusic']);
Route::get('/getMusic',[MusicController::class,'getMusic']);
Route::post('/editMusic/{id}',[MusicController::class,'editMusic']);
Route::delete('/deleteMusic/{id}',[MusicController::class,'deleteMusic']);

Route::post('/addFestivals',[FestivalsController::class,'addFestivals']);
Route::get('/getFestivals',[FestivalsController::class,'getFestivals']);
Route::post('/editFestivals/{id}',[FestivalsController::class,'editFestivals']);
Route::delete('/deleteFestivals/{id}',[FestivalsController::class,'deleteFestivals']);
