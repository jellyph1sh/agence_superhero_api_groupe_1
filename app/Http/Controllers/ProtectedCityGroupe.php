<?php

namespace App\Http\Controllers;

use App\Models\Protected_cities_groups_Model;
use Illuminate\Http\Request;

class ProtectedCityGroupe extends Controller
{

    /**
     * @OA\Post(
     *     path="/protected-cities-groups",
     *     summary="Add a protected city by group",
     *     description="Adds a new entry for a city protected by a group.",
     *     operationId="storeProtectedCityByGroup",
     *     tags={"Protected Cities by Group"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body for adding protected city by group",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id_group", type="integer", description="Group ID"),
     *             @OA\Property(property="id_city", type="integer", description="City ID")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", description="Successfully added protected city by group")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/protected-cities-groups/{id}",
     *     summary="Update a protected city by group",
    *     description="Updates an existing entry for a city protected by a group. UNFUNCTIONAL",
     *     operationId="updateProtectedCityByGroup",
     *     tags={"Protected Cities by Group"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the protected city group to update",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body for updating protected city by group",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id_group", type="integer", description="New group ID"),
     *             @OA\Property(property="id_city", type="integer", description="New city ID")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", description="Group updated successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", description="Protected city group not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
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
    /**
     * @OA\Delete(
     *     path="/protected-cities-groups/{id}",
     *     summary="Delete a protected city by group",
     *     description="Deletes an existing entry for a city protected by a group. UNFUNCTIONAL",
     *     operationId="destroyProtectedCityByGroup",
     *     tags={"Protected Cities by Group"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the protected city group to delete",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=202,
     *         description="Accepted",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", description="Protected city group deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", description="Protected city group not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */

    // public function destroy(string $id)
    // {
    //     $destroyProtectedCityGroupe = Protected_cities_groups_Model::find($id);
    //     $destroyProtectedCityGroupe->delete();

    //     return response()->json([
    //         "message" => "proctected city groupe $id deleted successfully"
    //     ], 202);
    // }

}