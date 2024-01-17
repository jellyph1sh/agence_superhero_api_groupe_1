<?php

use App\Http\Controllers\citiesController;
use App\Http\Controllers\gadgetController;
use App\Http\Controllers\groupsController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UsersController;
use App\Http\Controllers\SuperHeroController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Routes for users
Route::resource('users', UsersController::class)->except(['edit', 'create']);
// Routes for superHero
Route::resource('superHero', SuperHeroController::class)->except(['edit', 'create']);
// Routes for gadget
Route::resource('gadget', GadgetController::class)->except(['edit', 'create']);
// Routes for vehicule
Route::resource('vehicule', VehiculeController::class)->except(['edit', 'create']);
// Routes for city
Route::resource('city', CitiesController::class)->except(['edit', 'create']);
// Routes for groups
Route::resource('groups', GroupsController::class)->except(['edit', 'create']);

// Additional route for checking user authentication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


