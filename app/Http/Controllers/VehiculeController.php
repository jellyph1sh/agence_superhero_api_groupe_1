<?php

namespace App\Http\Controllers;

use App\Models\VehiculModel;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
* @OA\Get(
*     path="/vehicule}",
*     summary="show all vehicule",
*          @OA\Response(
*          response=200,
*          description="Successful operation",
*      ),
*  
*      tags={"vehicule"},
*      @OA\PathItem(
*      ),
*    
* ),
*/
public function index()
{
    $allVehicule = VehiculModel::all();
    return response()->json($allVehicule);
}


    /**
 * @OA\Post(
 *     path="/vehicule",
 *     summary="store new vehicule",
 *          @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *      ),
 *  
 *      tags={"vehicule"},
 *      @OA\PathItem(
 *      ),
 *    
 * ),
 * */
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
* @OA\Get(
*     path="/vehicule/{id}",
*     summary="update specific vehicule",
*          @OA\Response(
*          response=200,
*          description="Successful operation",
*      ),
*  
*      tags={"vehicule"},
*      @OA\PathItem(
*      ),
*    
* ),
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
 * @OA\Put(
 *     path="/vehicule/{id}",
 *     summary="update specific véhicule ",
 *          @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *      ),
 *  
 *      tags={"vehicule"},
 *      @OA\PathItem(
 *      ),
 *    
 * ),
 * */
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
 * @OA\Delete(
 *     path="/vehicule/delete{id}",
 *     summary="delete specific vehicule",
 *          @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *      ),
 *  
 *      tags={"vehicule"},
 *      @OA\PathItem(
 *      ),
 *    
 * ),
 * */
    public function destroy(string $id)
    {
        $destroyVehicule = VehiculModel::find($id);
        $destroyVehicule -> delete();

        return response()->json([
            "message" => "superhero $id deleted successfully"
        ], 202);
    }
}
