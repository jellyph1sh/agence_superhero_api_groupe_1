<?php

namespace App\Http\Controllers;

use App\Models\citiesModel;
use Illuminate\Http\Request;

class citiesController extends Controller
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
        $allCitiies = citiesModel::all();
        return response()->json($allCitiies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/gadget",
     *     summary="stor new gadget",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"gadget"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function store(Request $request)
    {
        $city_name = $request->input("city_name");
        $latitude = $request->input("latitude");
        $longitude = $request->input("longitude");
        $newCity = new citiesModel;
        $newCity->city_name = $city_name;
        $newCity->latitude = $latitude;
        $newCity ->longitude = $longitude;
        $newCity->save();
    }
    /**
  * @OA\Get(
*     path="/city/{id}",
*     summary="update specific city",
*          @OA\Response(
*          response=200,
*          description="Successful operation",
*      ),
*  
*      tags={"city"},
*      @OA\PathItem(
*      ),
*    
* ),
*/
 public function show(string $id)
 {
     $showCitiiesById = citiesModel::find($id);
     return response()->json($showCitiiesById);
 }



    /**
     * @OA\Put(
     *     path="/city/{id}",
     *     summary="update specific véhicule ",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"city"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function update(Request $request, string $id)
    {
        $updateCity = citiesModel::find($id);
        $cityName = $updateCity->input('city_name');
        $longitude = $updateCity->input('longitude');
        $latitude = $updateCity->input('latitude');
        $newCity = new citiesModel;
        $newCity->cityName = $cityName;
        $newCity->longitude = $longitude;
        $newCity->longitude = $latitude;
        $newCity->update();
        return response()->json([
            "message" => "superhero $id deleted successfully"
        ], 202);
    }

        /**
 * @OA\Delete(
 *     path="/city/delete{id}",
 *     summary="delete specific city",
 *          @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *      ),
 *  
 *      tags={"city"},
 *      @OA\PathItem(
 *      ),
 *    
 * ),
 * */
    public function destroy(string $id)
    {
        $destroyCity = citiesModel::find($id);
        $destroyCity -> delete();

        return response()->json([
            "message" => "superhero $id deleted successfully"
        ], 202);
    }            
       
}