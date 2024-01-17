<?php

namespace App\Http\Controllers;

use App\Models\Gadgets_users_Model;
use App\Models\Power_users_model;
use App\Models\Vehicul_users_Model;
use App\Models\vehiculeUserModel;
use Illuminate\Http\Request;
use App\Models\SuperHeroModel;
use Illuminate\Support\Facades\DB;


class SuperHeroController extends Controller
{
    /**
     * @OA\Get(
     *     path="/superhero",
     *     summary="Get all super Heros",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"superHero"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     */

    public function index()
    {
        $allSuperHero = SuperHeroModel::all();
        return response()->json($allSuperHero);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
  
    }

    /**
     * @OA\Post(
     *     path="/superHeros",
     *     summary="Create super hero",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="firstname", type="string"),
     *             @OA\Property(property="lastname", type="string"),
     *             @OA\Property(property="alias", type="string"),
     *             @OA\Property(property="sex", type="string"),
     *             @OA\Property(property="hair_color", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="wiki_url", type="string"),
     *             @OA\Property(property="origin_planet", type="string"),
     *             @OA\Property(property="id_creator", type="integer"),
     *             @OA\Property(property="id_gadget", type="integer"),
     *             @OA\Property(property="id_power", type="integer"),
     *             @OA\Property(property="id_vehicule", type="integer"),
     *         ),
     *     ),
     *     tags={"superHero"},
     * )
     */
    public function store(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $alias = $request->input('alias');
        $sex = $request->input('sex');
        $hair_color = $request->input('hair_color');
        $description = $request->input('description');
        $wiki_url = $request->input('wiki_url');
        $origin_planet = $request->input('origin_planet');
        $id_creator = $request->input('id_creator');
        $newSuperHero = new SuperHeroModel;
        $newSuperHero->firstname = $firstname;
        $newSuperHero->lastname = $lastname;
        $newSuperHero->alias = $alias;
        $newSuperHero->sex = $sex;
        $newSuperHero->hair_color = $hair_color;
        $newSuperHero->description = $description;
        $newSuperHero->wiki_url = $wiki_url;
        $newSuperHero->origin_planet = $origin_planet;
        $newSuperHero->id_creator = $id_creator;
        $newSuperHero->save();

        $superHeroId = $newSuperHero->id_hero;
        $gadgetUser = new Gadgets_users_Model;
        $vehiculeUser = new Vehicul_users_Model;
        $powerUser = new Power_users_model;
        $powerUser->id_hero = $superHeroId;
        $vehiculeUser->id_hero = $superHeroId;
        $gadgetUser->id_hero = $superHeroId;
        $gadgetUser->id_gadget =$request->input('id_gadget');
        $powerUser->id_power = $request->input('id_power');
        $vehiculeUser->id_vehicule = $request->input('id_vehicule');
        $powerUser->save();
        $vehiculeUser->save();
        $gadgetUser->save();
    }


    /**
     * @OA\Get(
     *     path="/superHero/{id}",
     *     summary="Get specific super hero with values from gadgets, cities, powers, and groups",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the super hero to be retrieved",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"superHero"},
     * )
     */
    public function show(string $id)
    {
        $superHero = DB::table('superheroes')
            ->leftjoin('power_users', 'superheroes.id_hero', '=', 'power_users.id_hero')
            ->leftjoin('powers', 'power_users.id_power', '=', 'powers.id_power')
            ->leftjoin('gadgets_users','superheroes.id_hero', '=', 'gadgets_users.id_hero')
            ->leftjoin('gadgetS','gadgets_users.id_gadget', '=', 'gadgetS.id_gadget')
            ->leftjoin('vehicules_users','superheroes.id_hero', '=', 'vehicules_users.id_hero')
            ->leftjoin('vehicules','vehicules_users.id_vehicule', '=', 'vehicules.id_vehicule')
            ->leftjoin('protected_cities','superheroes.id_hero', '=', 'protected_cities.id_hero')
            ->leftjoin('cities', 'protected_cities.id_city', '=', 'cities.id_city')
            ->leftjoin('protected_cities_groups','cities.id_city', '=', 'protected_cities_groups.id_city')
            ->leftjoin('groups', 'protected_cities_groups.id_group', '=', 'groups.id_group')
            ->select('superheroes.*', 'power_users.*', 'powers.*', 'gadgetS.*','vehicules.*', 'groups.*','cities.*')
            ->where('superheroes.id_hero', $id)

            ->first();
        return response() -> json($superHero);
    }


    public function edit(string $id)
    {
        $superHero = SuperHeroModel::find($id);
        return view('superHero.edit', compact('superHero'));    
    }
    /**
     * @OA\Put(
     *     path="/superHero/{id}",
     *     summary="Update specific super hero",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the super hero to be updated",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="lastname", type="string"),
     *             @OA\Property(property="alais", type="string"),
     *             @OA\Property(property="sex", type="string"),
     *             @OA\Property(property="hair_color", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="wiki_url", type="string"),
     *             @OA\Property(property="origin_planet", type="string"),
     *         ),
     *     ),
     *     tags={"superHero"},
     * )
     */
public function update(Request $request, string $id)
{
    $updateSuperHero = SuperHeroModel::find($id);

    if (!$updateSuperHero) {
        return redirect()->back()->with('error', "Super Hero not found");
    }

    $updateSuperHero->firstname = $request->input('name');
    $updateSuperHero->lastname = $request->input('lastname');
    $updateSuperHero->alais = $request->input('alais');
    $updateSuperHero->sexo = $request->input('sex');
    $updateSuperHero->hair_color = $request->input('hair_color');
    $updateSuperHero->description = $request->input('description');
    $updateSuperHero->wiki_url = $request->input('wiki_url');
    $updateSuperHero->origin_planet = $request->input('origin_planet');

    $updateSuperHero->save();

    return redirect()->back()->with('status', "Super Hero $id updated successfully");
}

    /**
     * @OA\Delete(
     *     path="/superHero/{id}",
     *     summary="Delete specific super hero",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the super hero to be deleted",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"superHero"},
     * )
     */
    public function destroy($id)
    {
        $superHeroToDestroy = SuperHeroModel::find($id);

       $superHeroToDestroy->delete();

        return response()->json([
                "message" => "superhero $id deleted successfully"
            ], 202);
      
    }
}
