<?php

namespace App\Http\Controllers;

use App\Models\Protected_cities_groups_Model;
use Illuminate\Http\Request;

class ProtectedCityGroupe extends Controller
{
    

    public function store(Request $request)
    {
        $id_group = $request->input("id_group");
        $id_city = $request->input("id_city");
        $newProtecedCityGroupe = new Protected_cities_groups_Model;
        $newProtecedCityGroupe->id_group = $id_group;
        $newProtecedCityGroupe->id_city = $id_city;
        $newProtecedCityGroupe->save();
        return response()->json(['message' => 'protected city by group added succefully'], 200);

    }

    // public function update(Request $request, string $id)
    // {
    //     $updateProtectedCityGroup = Protected_cities_groups_Model::find($id);

    //     if (!$updateProtectedCityGroup) {
    //         return response()->json([
    //             "error" => "protected city groupe not found"
    //         ], 404);
    //     }

    //     $id_group = $request->input("id_group");
    //     $id_city = $request->input("id_city");

    //     $updateProtecedCityGroup->id_group = $id_group;
    //     $updateProtecedCityGroup->id_city = $id_city;

    //     $updateProtecedCityGroup->save();

    //     return response()->json([
    //         "message" => "Group $id updated successfully"
    //     ], 200);
    // }

    // public function destroy(string $id)
    // {
    //     $destroyProtectedCityGroupe = Protected_cities_groups_Model::find($id);
    //     $destroyProtectedCityGroupe->delete();

    //     return response()->json([
    //         "message" => "proctected city groupe $id deleted successfully"
    //     ], 202);
    // }

}