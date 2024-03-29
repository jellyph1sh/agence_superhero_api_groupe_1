<?php

namespace App\Http\Controllers;

use App\Models\citiesModel;
use Illuminate\Http\Request;

class citiesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/city",
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
     * @OA\Post(
     *     path="/city",
     *     summary="stor new city",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  @OA\Parameter(
 *         name="city_name",
 *         in="path",
 *         description="city_name of the city to be store",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 * @OA\Parameter(
 *         name="latitude",
 *         in="path",
 *         description="latitude of the city to be store",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 * @OA\Parameter(
 *         name="longitude",
 *         in="path",
 *         description="longitude of the city to be store",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
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
        return response()->json(['message' => 'city create succeful'], 200);

    }
    /**
  * @OA\Get(
*     path="/city/{id}",
*     summary="update specific city",
*          @OA\Response(
*          response=200,
*          description="Successful operation",
*      ),
@OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the city to show",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
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
   *     summary="update specific city",
   *          @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *      ),
     *  @OA\Parameter(
 *         name="city_name",
 *         in="path",
 *         description="city_name of the city to be store",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 * @OA\Parameter(
 *         name="latitude",
 *         in="path",
 *         description="latitude of the city to be store",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 * @OA\Parameter(
 *         name="longitude",
 *         in="path",
 *         description="longitude of the city to be store",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
     *      tags={"city"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */


    public function update(Request $request, string $id)
    {
        $updateCity = citiesModel::find($id);

        if (!$updateCity) {
            return response()->json([
                "message" => "City not found"
            ], 404);
        }

        $cityName = $request->input('city_name');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');

        $updateCity->cityName = $cityName;
        $updateCity->longitude = $longitude;
        $updateCity->latitude = $latitude;

        $updateCity->save();

        return response()->json([
            "message" => "City $id updated successfully"
        ], 202);
    }


    /**
     * @OA\Delete(
     *     path="/city/{id}",
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
