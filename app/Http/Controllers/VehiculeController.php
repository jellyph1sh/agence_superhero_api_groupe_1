<?php

namespace App\Http\Controllers;

use App\Models\VehiculModel;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/vehicule",
     *      summary="Show all vehicles",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      tags={"vehicule"},
     * )
     */
public function index()
{
    $allVehicule = VehiculModel::all();
    return response()->json($allVehicule);
}



    /**
     * @OA\Post(
     *      path="/vehicule",
     *      summary="Store new vehicle",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      tags={"vehicule"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="vehicule_name", type="string"),
     *              @OA\Property(property="vehicule_description", type="string"),
     *          ),
     *      ),
     * )
     */
    public function store(Request $request)
    {
        $vehiculeName = $request->input('vehicule_name');
        $vehicule_description = $request->input('vehicule_description');
        $newVehicule = new VehiculModel();
        $newVehicule -> vehicule_name = $vehiculeName;
        $newVehicule -> vehicule_description = $vehicule_description;
        $newVehicule -> save();

        return response()->json([
            "message" => "new vehicule added successfully"
        ], 202);
    }

    /**
     * @OA\Get(
     *      path="/vehicule/{id}",
     *      summary="Show specific vehicle",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the vehicle to be retrieved",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      tags={"vehicule"},
     * )
     */
 public function show(string $id)
 {
     $showVehicule = VehiculModel::find($id);
     return response()->json($showVehicule);
 }



    /**
     * @OA\Put(
     *      path="/vehicule/{id}",
     *      summary="Update specific vehicle",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the vehicle to be updated",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="vehicule_name", type="string"),
     *              @OA\Property(property="vehicule_description", type="string"),
     *          ),
     *      ),
     *      tags={"vehicule"},
     * )
     */

    public function update(Request $request, string $id)
    {
        $updateVehicule = VehiculModel::find($id);

        if (!$updateVehicule) {
            return response()->json(["error" => "Vehicule not found"], 404);
        }

        $vehicule_name = $request->input('vehicule_name');
        $vehicule_description = $request->input('vehicule_description');

        $updateVehicule->vehicule_name = $vehicule_name;
        $updateVehicule->vehicule_description = $vehicule_description;

        $updateVehicule->save();

        return response()->json([
            "message" => "Vehicule $id updated successfully"
        ], 202);
    }

    /**
     * @OA\Delete(
     *      path="/vehicule/{id}",
     *      summary="Delete specific vehicle",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the vehicle to be deleted",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      tags={"vehicule"},
     * )
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
