<?php

namespace App\Http\Controllers;

use App\Models\VehiculModel;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allVehicule = VehiculModel::all();
        return response()->json($allVehicule);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehiculeName = $request->input('vehicule_name');
        $vehicule_description = $request->input('vehicule_description');
        $newVehicule = new VehiculModel();
        $newVehicule -> vehucule_name = $vehiculeName;
        $newVehicule -> vehicule_description = $vehicule_description;
        $newVehicule -> save();

        return response()->json([
            "message" => "new vehicule added successfully"
        ], 202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showVehicule = VehiculModel::find($id);
        return response()->json($showVehicule);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateVehicule = VehiculModel::find($id);
        $vehicule_name = $updateVehicule-> input('vehicule_name');
        $vehicule_description = $updateVehicule-> input('vehicule_description');
        $newVehicule = new VehiculModel;
        $newVehicule -> vehicule_name = $vehicule_name;
        $newVehicule->vehicule_description = $vehicule_description;
        $newVehicule->update();
        return response()->json([
            "message" => "superhero $id deleted successfully"
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroyVehicule = VehiculModel::find($id);
        $destroyVehicule -> delete();

        return response()->json([
            "message" => "superhero $id deleted successfully"
        ], 202);
    }
}
