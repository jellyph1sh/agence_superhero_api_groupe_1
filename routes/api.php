<?php

use App\Http\Controllers\citiesController;
use App\Http\Controllers\gadgetController;
use App\Http\Controllers\groupsController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;

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
Route::post('/login',[UserController::class, 'login']);
Route::resource('users', UsersController::class)->except(['edit', 'create']);

Route::resource('superHero', SuperHeroController::class)->except(['edit', 'create']);

Route::resource('gadget', GadgetController::class)->except(['edit', 'create']);

Route::resource('vehicule', VehiculeController::class)->except(['edit', 'create']);

Route::resource('city', CitiesController::class)->except(['edit', 'create']);

Route::resource('groups', GroupsController::class)->except(['edit', 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    
});