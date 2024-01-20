<?php

namespace App\Http\Controllers;

use App\Models\PowersModel;
use Illuminate\Http\Request;

class PowersController extends Controller
{
    /**
     * @OA\Get(
     *     path="/power",
     *     summary="Show all powers",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     tags={"powers"},
     * )
     */
    public function index()
    {
        $getAllPower = PowersModel::all();
        return response()->json($getAllPower);
    }

    /**
     * @OA\Post(
     *     path="/powers",
     *     summary="Store new power",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="power_name",
     *         in="query",
     *         description="Name of the power to be stored",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="power_description",
     *         in="query",
     *         description="Description of the power to be stored",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"powers"},
     * )
     */    public function store(Request $request)
    {
        $power_name = $request->input("power_name");
        $power_description = $request->input("power_description");
        $newPower = new PowersModel;
        $newPower->power_name = $power_name;
        $newPower->power_description = $power_description;
        $newPower->save();
        return response()->json(['message' => 'power creation succeful'], 200);

    }
    /**
     * @OA\Get(
     *     path="/powers/{id}",
     *     summary="Show specific power",
     *     @OA\Response(
     *         response=404,
     *         description="Power not found",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the power to be retrieved",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"powers"},
     * )
     */
    public function show(string $id)
    {
        $powers = PowersModel::find($id);
        if (!empty($powers)) {
            return response()->json($powers);
        } else {
            return response()->json(["message : " => "power $id not found"], 404);
        }
    }

 
    /**
     * @OA\Delete(
     *     path="/powers/{id}",
     *     summary="Delete specific power",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the power to be deleted",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"powers"},
     * )
     */
    public function destroy(string $id)
    {
        $deletPower = PowersModel::find($id);
        $deletPower -> delete();
        return response()->json([
            "message" => "delete $id deleted successfully"
        ], 202);
    }
}
