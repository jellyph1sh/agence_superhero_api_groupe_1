<?php

namespace App\Http\Controllers;

use App\Models\Gadgets_users_Model;
use App\Models\Power_users_model;
use App\Models\Protected_cities_Model;
use App\Models\Vehicul_users_Model;
use App\Models\vehiculeUserModel;
use Illuminate\Http\Request;
use App\Models\SuperHeroModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $superHero = DB::table('superheroes')
            ->leftjoin('power_users', 'superheroes.id_hero', '=', 'power_users.id_hero')
            ->leftjoin('powers', 'power_users.id_power', '=', 'powers.id_power')
            ->leftjoin('gadgets_users', 'superheroes.id_hero', '=', 'gadgets_users.id_hero')
            ->leftjoin('gadgetS', 'gadgets_users.id_gadget', '=', 'gadgetS.id_gadget')
            ->leftjoin('vehicules_users', 'superheroes.id_hero', '=', 'vehicules_users.id_hero')
            ->leftjoin('vehicules', 'vehicules_users.id_vehicule', '=', 'vehicules.id_vehicule')
            ->leftjoin('protected_cities', 'superheroes.id_hero', '=', 'protected_cities.id_hero')
            ->leftjoin('cities', 'protected_cities.id_city', '=', 'cities.id_city')
            ->leftjoin('protected_cities_groups', 'cities.id_city', '=', 'protected_cities_groups.id_city')
            ->leftjoin('groups', 'protected_cities_groups.id_group', '=', 'groups.id_group')
            ->select('superheroes.*', 'powers.*', 'gadgetS.*', 'vehicules.*', 'groups.*', 'cities.*')
            ->groupBy('superheroes.id_hero')

            ->get();

        return response()->json($superHero);
    }
    /**
        * @OA\Post(
        *      path="/superHero/edit",
        *      operationId="editSuperHero",
        *      tags={"Super Hero"},
        *      summary="Edit the details of a Super Hero",
        *      description="Edit the details of a Super Hero if the user has the necessary permissions.",
        *      @OA\RequestBody(
        *          required=true,
        *          @OA\JsonContent(
        *              required={"id_hero", "lastname", "firstname", "alias", "sex", "hair_color", "description", "wiki_url", "origin_planet"},
        *              @OA\Property(property="id_hero", type="integer", example=1),
        *              @OA\Property(property="lastname", type="string", example="Doe"),
        *              @OA\Property(property="firstname", type="string", example="John"),
        *              @OA\Property(property="alias", type="string", example="Superman"),
        *              @OA\Property(property="sex", type="string", example="Male"),
        *              @OA\Property(property="hair_color", type="string", example="Black"),
        *              @OA\Property(property="description", type="string", example="The Man of Steel"),
        *              @OA\Property(property="wiki_url", type="string", example="https://en.wikipedia.org/wiki/Superman"),
        *              @OA\Property(property="origin_planet", type="string", example="Krypton")
        *          )
        *      ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful operation",
        *          @OA\JsonContent(
        *              @OA\Property(property="message", type="string", example="done")
        *          )
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="User unauthorized",
        *          @OA\JsonContent(
        *              @OA\Property(property="message", type="string", example="user unauthorized")
        *          )
        *      ),
        * )
        */

    public function EditSuperHero(Request $request) {
        $user = Auth::user();
        $hero = SuperHeroModel::where('id_hero', request('id_hero'))->where('id_creator', $user->id_user)->first();
       
        if ($hero){
            $hero->lastname = $request->input('lastname');
            $hero->firstname = $request->input('firstname');
            $hero->alias = $request->input('alias');
            $hero->sex = $request->input('sex');
            $hero->hair_color = $request->input('hair_color');
            $hero->description = $request->input('description');
            $hero->wiki_url = $request->input('wiki_url');
            $hero->origin_planet = $request->input('origin_planet');

            $hero->save();
            return response()->json(['message' => 'done'], 200);
        } else {
            
            return response()->json(['message' => 'acced granded'], 403);
        }
    }
   

    /**
     * @OA\Post(
     *     path="/superHeros",
     *     summary="Create super hero",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     * @OA\Response(
     *         response=400,
     *         description="missing argument",
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
     *             @OA\Property(property="id_city", type="integer"),

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
        $user = Auth::user();
        $id_creator = $user->id_user;
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
        //$protected_cities = new Protected_cities_Model;
        //$gadgetUser = new Gadgets_users_Model;
        $vehiculeUser = new Vehicul_users_Model;
        //$powerUser = new Power_users_model;*/
        if (!empty($superHeroId)) {
            //$protected_cities->id_hero = $superHeroId;
            //$gadgetUser->id_hero = $superHeroId;
            //$powerUser->id_hero = $superHeroId;
            $vehiculeUser->id_hero = $superHeroId;

            if ($request->filled(['city', 'id_gadget', 'id_power', 'id_vehicule'])) {
                //$protected_cities->id_city = $request->input('city');
                //$gadgetUser->id_gadget = $request->input('id_gadget');
                //$powerUser->id_power = $request->input('id_power');
                $vehiculeUser->id_vehicule = $request->input('id_vehicule');

                //$powerUser->save();
                $vehiculeUser->save();
                //$gadgetUser->save();*/
                //$protected_cities->save();
                return response()->json(['message' => 'Superhero details and associations saved successfully'], 200);

            } else {
                return response()->json(['error' => 'One or more required fields are missing'], 400);

            }
        } else {
            return response()->json(['error' => 'One or more required fields are missing'], 400);

        }
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
     *  @OA\Response(
     *         response=404,
     *         description="missing operation",
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

    validator(request()->all(), [
        'id_hero' => ['required'],
        'lastname' => ['required'],
        'firstname' => ['required'],
        'alias' => ['required'],
        'sex' => ['required'],
        'hair_color' => ['required'],
        'description' => ['required'],
        'wiki_url' => ['required'],
        'origin_planet' => ['required']
    ])->validate();
    $user = Auth::user();
    $hero = SuperHeroModel::where('id_hero', request('id_hero'))->where('user_id', $user->id)->first();
   
    if ($hero){
        $hero->lastname = $request['lastname'];
        $hero->firstname = $request['firstname'];
        $hero->alias = $request['alias'];
        $hero->sex = $request['sex'];
        $hero->hair_color = $request['hair_color'];
        $hero->description = $request['description'];
        $hero->wiki_url = $request['wiki_url'];
        $hero->origin_planet = $request['origin_planet'];

        $hero->save();
        return response()->json(['message' => 'done'], 200);
    } else {
        
        return response()->json(['message' => 'user unauthorized'], 403);
    }
    // $updateSuperHero = SuperHeroModel::find($id);

    // if (!$updateSuperHero) {
    //         return response()->json(['message' => 'Superhero not found'], 404);
    //     }

    // $updateSuperHero->firstname = $request->input('name');
    // $updateSuperHero->lastname = $request->input('lastname');
    // $updateSuperHero->alais = $request->input('alais');
    // $updateSuperHero->sexo = $request->input('sex');
    // $updateSuperHero->hair_color = $request->input('hair_color');
    // $updateSuperHero->description = $request->input('description');
    // $updateSuperHero->wiki_url = $request->input('wiki_url');
    // $updateSuperHero->origin_planet = $request->input('origin_planet');

    // $updateSuperHero->save();

    //     return response()->json(['message' => 'Superhero update and associations saved successfully'], 200);
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
