<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperHeroModel;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSuperHero = SuperHeroModel::getAll();
        return response()->json($allSuperHero);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $alias = $request->input('alias');
        $sex = $request->input('sex');
        $hair_color = $request->input('hair_color');
        $role = $request->input('role');
        $description = $request->input('description');
        $sidekick = $request->input('sidekick');
        $wiki_url = $request->input('wiki_url');
        $id_group = $request->input('id_group');
        $origin_planet = $request->input('origin_planet');
        $id_creator = $request->input('id_creator');
        $newSuperHero = new SuperHeroModel;
        $newSuperHero->firstname = $firstname;
        $newSuperHero->lastname = $lastname;
        $newSuperHero->alias = $alias;
        $newSuperHero->sex = $sex;
        $newSuperHero->hair_color = $hair_color;
        $newSuperHero->role = $role;
        $newSuperHero->description = $description;
        $newSuperHero->sidekick = $sidekick;
        $newSuperHero->wiki_url = $wiki_url;
        $newSuperHero->id_group = $id_group;
        $newSuperHero->origin_planet = $origin_planet;
        $newSuperHero->id_creator = $id_creator;
        $newSuperHero->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $superHeroById = SuperHeroModel::find($id);
        if (!empty($superHeroById)){
            return response() -> json($superHeroById);
        }else{
            return response() -> json(["message : "=> "user $id not found"]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $superHero = SuperHeroModel::find($id);
        return view('superHero.edit', compact('superHero'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateSuperHero = SuperHeroController::find($id);
        $updateSuperHero->firstname = $request->input('name');
        $updateSuperHero->lastname = $request->input('lastname');
        $updateSuperHero->alais = $request->input('alais');
        $updateSuperHero->sexo = $request->input('sex');
        $updateSuperHero->hair_color = $request->input('hair_color');
        $updateSuperHero->description = $request->input('description');
        $updateSuperHero->sidekick = $request->input('sidekick');
        $updateSuperHero->wiki_url = $request->input('wiki_url');
        $updateSuperHero->origin_planet = $request->input('origin_planet');
        $updateSuperHero->update();
        return redirect()->back()->with('status', "Super Hero $id updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
