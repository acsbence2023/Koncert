<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/addCity',[CityController::class,'addCity']);
Route::get('/getCities',[CityController::class,'getCities']);
Route::post('/updateCity/{id}',[CityController::class,'updateCity']);
Route::delete('/deleteCity/{id}',[CityController::class,'deleteCity']);

Route::post('/adduser', [UserController::class, 'addUser']);
Route::get('/users', [UserController::class, 'listUsers']);
Route::get('/users/{id}', [UserController::class, 'getUser']);