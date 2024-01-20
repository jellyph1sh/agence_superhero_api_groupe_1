<?php

use App\Http\Controllers\citiesController;
use App\Http\Controllers\gadgetController;
use App\Http\Controllers\groupsController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\PowersController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\SuperHeroController;
use App\Http\Controllers\SuperHroEditController;
use App\http\Controllers\ProtectedCityGroupe;
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
//Get all route in order
Route::get('/', function () {
    $routes = Route::getRoutes();

    $groupedRoutes = [];

    foreach ($routes as $route) {
        $methods = $route->methods();
        $uri = $route->uri();
        
        foreach ($methods as $method) {
            $groupedRoutes[$method][] = $method . ': ' . $uri;
        }
    }

    return response()->json(['routes' => $groupedRoutes]);
});

Route::post('/login',[UserController::class, 'login']);
// Routes for users
Route::resource('users', UsersController::class)->except(['edit', 'create'])->middleware('auth:sanctum');
// Routes for superHero
Route::resource('superHero', SuperHeroController::class)->except(['edit', 'create'])->middleware('auth:sanctum');
// Routes for editing 
Route::post('superHero/edit', [SuperHeroController::class, 'EditSuperHero'])->middleware('auth:sanctum');
// Routes for gadget
Route::resource('gadget', GadgetController::class)->except(['edit', 'create'])->middleware('auth:sanctum');
// Routes for vehicule
Route::resource('vehicule', VehiculeController::class)->except(['edit', 'create'])->middleware('auth:sanctum');
// Routes for protected city groupe
Route::post('protectedCityGroup', [ProtectedCityGroupe::class, 'store'])->middleware('auth:sanctum');
// Routes for city
Route::resource('city', CitiesController::class)->except(['edit', 'create'])->middleware('auth:sanctum');
// Routes for groups
Route::resource('groups', GroupsController::class)->except(['edit', 'create'])->middleware('auth:sanctum');
// Routes for powers
Route::resource('powers', PowersController::class)->except(['edit', 'create'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
