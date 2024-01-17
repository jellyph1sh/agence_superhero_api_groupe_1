<?php

namespace App\Http\Controllers;

use App\Models\citiesModel;
use Illuminate\Http\Request;

class citiesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/city}",
     *     summary="show all city",
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
     *     path="/city",
     *     summary="stor new city",
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
        $cityName = $request->input('city_name');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $newCity = new citiesModel;
        $newCity->cityName = $cityName;
        $newCity->longitude = $longitude;
        $newCity->latitude = $latitude;
        $newCity->update();
        return response()->json([
            "message" => "group $id update successfully"
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
            "message" => "group $id deleted successfully"
        ], 202);
    }            
       
}
